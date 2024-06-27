<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\PlanContable;
use App\Models\Opigv;
use App\Models\EstadoDocumento;
use App\Models\Estado;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
class CompraVentaForm extends Component
{
    public $libro, $fecha_doc, $fecha_ven, $id_type, $ser, $num, $cod_moneda;
    public $tip_cam, $opigv, $bas_imp, $igv, $no_gravadas, $isc, $imp_bol_pla, $otro_tributo;
    public $precio, $glosa, $cnta1, $cnta2, $cnta3, $cnta_precio, $mon1, $mon2, $mon3;
    public $cc1, $cc2, $cc3, $cta_otro_t, $fecha_emod, $tdoc_emod, $ser_emod, $num_emod;
    public $fec_emi_detr, $num_const_der, $tiene_detracc, $cta_detracc, $mont_detracc;
    public $ref_int1, $ref_int2, $ref_int3, $estado_doc, $estado;

    public $libros, $opigvs, $estado_docs, $estados;

    public $correntistaData;

    public function mount()
    {
        $this->libros = Libro::all();
        $this->opigvs = Opigv::all();
        $this->estado_docs = EstadoDocumento::all();
        $this->estados = Estado::all();
    }

    #[On('correntistaEncontrado')]
    public function handleCorrentistaEncontrado($data)
    {
        Log::info('Correntista data received in CompraVentaForm: ', $data);
        $this->correntistaData = $data;
    }

    private function calcularMontos(&$data)
    {
        // Realizar cálculos según la moneda
        if ($this->cod_moneda == 'USD') {
            $data['mon1'] = round($this->mon1 * $this->tip_cam, 2);
            $data['mon2'] = round($this->mon2 * $this->tip_cam, 2);
            $data['mon3'] = round($this->mon3 * $this->tip_cam, 2);
            $data['igv'] = round($this->igv * $this->tip_cam, 2);
            $data['otro_tributo'] = round($this->otro_tributo * $this->tip_cam, 2);
            $data['bas_imp'] = round($this->bas_imp * $this->tip_cam, 2);
        }
    }

    private function agregarDestinos($cuenta)
    {
        // Realizar consulta para obtener destinos
        $destinos = PlanContable::select('Dest1D', 'Dest1H', 'Dest2D', 'Dest2H')
                                ->where('CtaCtable', $cuenta)
                                ->first();

        $resultados = [];
        if ($destinos) {
            foreach ($destinos->toArray() as $dest) {
                if (trim($dest) !== '') {
                    $resultados[] = $dest;
                }
            }
        }
        return $resultados;
    }


    public function submit()
    {
        // Emitir el evento 'dataSubmitted' con los datos del formulario
        $data = $this->validate([
            'libro' => 'required',
            'fecha_doc' => 'required|date',
            'fecha_ven' => 'required|date',
            'num' => 'required',
            'cod_moneda' => 'required',
            'tip_cam' => 'required',
            'opigv' => 'required',
            'bas_imp' => 'required',
            'igv' => 'required',
            'glosa' => 'required',
            'cnta1' => 'required',
            'mon1' => 'required',
            'estado_doc' => 'required',
            'estado' => 'required'
        ]);

        Log::info('Data submitted: ', $data);

        // Agregar datos del correntista
        $data['correntistaData'] = $this->correntistaData;

        // Realizar cálculos de montos
        $this->calcularMontos($data);

        // Obtener y agregar destinos para las cuentas
        foreach (['cnta1', 'cnta2', 'cnta3'] as $cuenta) {
            if ($this->$cuenta) {
                $data["{$cuenta}_destinos"] = $this->agregarDestinos($this->$cuenta);
            }
        }

        Log::info('Data with calculations and destinations: ', $data);

        // Emitir el evento 'dataSubmitted' con los datos del formulario
        $this->dispatch('dataSubmitted', $data);
    }


    public function render()
    {
        return view('livewire.compra-venta-form');
    }
}
