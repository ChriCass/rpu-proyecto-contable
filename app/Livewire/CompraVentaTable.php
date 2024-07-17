<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use App\Models\Empresa;
use App\Models\Libro;
use App\Models\OpIgv;
use App\Models\EstadoDocumento;
use App\Models\TipoComprobantePagoDocumento;
use App\Models\Estado;
use App\Models\Tabla;
use Exception;
use Carbon\Carbon;

class CompraVentaTable extends Component

{
    public $data = [];
    public $montoDolares = [];
    public $empresa;
    public $rows = [];
    public $libros, $opigvs, $estado_docs, $estados, $ComprobantesPago;
    public $statusMessage;
    public $statusType;
    #[On('dataSubmitted')]
    public function handleDataSubmitted($data)
    {
        $this->data = $data;
        Log::info('Data received in CompraVentaTable: ', $this->data);
    }

    #[On('montoDolaresGuardado')]
    public function handleMontoDolaresGuardado($data)
    {
        $this->montoDolares = $data;
        Log::info('Data received in CompraVentaTable: ', $this->montoDolares);
    }

    public function mount()
    {
        $this->empresa = Empresa::find(1);
        $this->libros = Libro::all();
        $this->opigvs = Opigv::all();
        $this->estado_docs = EstadoDocumento::all();
        $this->estados = Estado::all();
        $this->ComprobantesPago = TipoComprobantePagoDocumento::all();
    }

    public function NoMoreRow()
    {
        $this->data = [];
    }
    public function insertData()
    {
        Log::info('Starting data insertion');
        try {
            // Determinar el valor de Vou
            $vou = $this->getVou($this->data['fecha_doc'], $this->data['libro']);
            $this->data['Vou'] = $vou;

            // Verificar y asignar Cnta y DebeHaber para la primera inserción
            if (empty($this->data['cnta1']['cuenta']) || !isset($this->data['cnta1']['DebeHaber'])) {
                throw new Exception("La columna 'cnta1' o su 'DebeHaber' no puede ser nula");
            }
            $this->data['Cnta'] = $this->data['cnta1']['cuenta'];
            $this->data['DebeHaber'] = $this->data['cnta1']['DebeHaber'];
            $this->data['MontSoles'] = $this->data['mon1'];

            // Inserción de la data principal
            Log::info('Inserting main data');
            $this->insertIntoTabla($this->data);

            // Inserción de cuenta_igv
            if (!empty($this->data['cuenta_igv'])) {
                Log::info('Inserting cuenta_igv');
                $igvData = $this->data;
                $igvData['Cnta'] = $this->data['cuenta_igv']['valor'];
                $igvData['DebeHaber'] = $this->data['cuenta_igv']['DebeHaber'];
                $igvData['MontSoles'] = $this->data['igv'];
                $this->insertIntoTabla($igvData);
            }

            // Inserción de cuentas destino
            foreach (['cnta1', 'cnta2', 'cnta3'] as $index => $cuentaKey) {
                if (!empty($this->data["{$cuentaKey}_destinos"])) {
                    foreach ($this->data["{$cuentaKey}_destinos"] as $destino) {
                        Log::info('Inserting destino for ' . $cuentaKey, ['destino' => $destino]);
                        $destinoData = $this->data;
                        $destinoData['Cnta'] = $destino['cuenta'];
                        $destinoData['DebeHaber'] = $destino['DebeHaber'];
                        $destinoData['MontSoles'] = $destino['monto'];
                        $this->insertIntoTabla($destinoData);
                    }
                }
            }

            // Inserción de cuenta_precio
            if (!empty($this->data['cnta_precio'])) {
                Log::info('Inserting cuenta_precio');
                $precioData = $this->data;
                $precioData['Cnta'] = $this->data['cnta_precio']['cuenta'];
                $precioData['DebeHaber'] = $this->data['cnta_precio']['DebeHaber'];
                $precioData['MontSoles'] = $this->data['cnta_precio']['precioTotal'];
                $this->insertIntoTabla($precioData);
            }

            Log::info('Data insertion completed');
            $this->statusMessage = "Data inserted successfully!";
            $this->statusType = 'success';
        } catch (Exception $e) {
            Log::error('Data insertion failed', ['error' => $e->getMessage()]);
            $this->statusMessage = 'Error al insertar los datos: ' . $e->getMessage();
            $this->statusType = 'danger';
        }
    }
    private function getVou($fechaDoc, $libro)
    {
        $mes = date('m', strtotime($fechaDoc));

        $lastVou = Tabla::where('Mes', $mes)
                        ->where('Libro', $libro)
                        ->orderBy('Vou', 'desc')
                        ->first(['Vou']);

        if ($lastVou) {
            return $lastVou->Vou + 1;
        }

        return 1;
    }
    private function insertIntoTabla($data)
    {
        Log::info('Inserting into Tabla', ['data' => $data]);

        Tabla::create([
            'id_empresa' => $data['empresa'],
            'Mes' => $data['fecha_vaucher'] ? date('m', strtotime($data['fecha_vaucher'])) : null,
            'Libro' => $data['libro'] ?? null,
            'Vou' => $data['Vou'] ?? null,
            'Fecha_Vou' => $data['fecha_vaucher'] ?? null,
            'GlosaGeneral' => $data['glosa'] ?? null,
            'Corrent' => $data['correntistaData']['dni'] ?? $data['correntistaData']['ruc'] ?? null,
            'TDoc' => $data['tdoc'] ?? null,
            'Ser' => $data['ser'] ?? null,
            'Num' => $data['num'] ?? null,
            'Cnta' => $data['Cnta'] ?? null,
            'DebeHaber' => $data['DebeHaber'] ?? null,
            'MontSoles' => $data['MontSoles'] ?? null,
            'MontDolares' => $data['MontDolares'] ?? null,
            'TipCam' => $data['TipCam'] ?? null,
            'GlosaEpecifica' => $data['GlosaEpecifica'] ?? $data['glosa'] ?? null,
            'CC' => $data['CC'] ?? null,
            'TipMedioDePago' => $data['TipMedioDePago'] ?? null,
            'Fecha_Doc' => $data['fecha_doc'] ?? null,
            'Fecha_Ven' => $data['fecha_ven'] ?? null,
            'ADuaDsi' => $data['ADuaDsi'] ?? null,
            'TOpIgv' => $data['opigv'] ?? null,
            'BasImp' => $data['bas_imp'] ?? null,
            'IGV' => $data['igv'] ?? null,
            'NoGravadas' => $data['NoGravadas'] ?? null,
            'ISC' => $data['ISC'] ?? null,
            'ImpBolPla' => $data['ImpBolPla'] ?? null,
            'OtroTributo' => $data['OtroTributo'] ?? null,
            'CodMoneda' => $data['cod_moneda'] ?? null,
            'FechaEMod' => $data['FechaEMod'] ?? null,
            'TDocEMod' => $data['TDocEMod'] ?? null,
            'SerEMod' => $data['SerEMod'] ?? null,
            'CodDepenDUAoDSI' => $data['CodDepenDUAoDSI'] ?? null,
            'NumEMod' => $data['NumEMod'] ?? null,
            'FecEmiDetr' => $data['FecEmiDetr'] ?? null,
            'NumConstDer' => $data['NumConstDer'] ?? null,
            'MarRet' => $data['MarRet'] ?? null,
            'ClasBienes' => $data['ClasBienes'] ?? null,
            'IdenContrat' => $data['IdenContrat'] ?? null,
            'Err1' => $data['Err1'] ?? null,
            'Err2' => $data['Err2'] ?? null,
            'Err3' => $data['Err3'] ?? null,
            'Err4' => $data['Err4'] ?? null,
            'RefInt' => $data['RefInt'] ?? null,
            'idEstadoDoc' => $data['estado_doc'] ?? null,
            'Estado' => $data['estado'] ?? null,
            'Usuario' => $data['usuario']['id'] ?? null
        ]);

        Log::info('Inserted into Tabla successfully');
    }
    public function render()
    {
        return view('livewire.compra-venta.compra-venta-table', [
            'data' => $this->data, 'libros' => $this->libros,
            'opigvs' => $this->opigvs,
            'estado_docs' => $this->estado_docs,
            'estados' => $this->estados,
            'ComprobantesPago' => $this->ComprobantesPago
        ]);
    }
}
