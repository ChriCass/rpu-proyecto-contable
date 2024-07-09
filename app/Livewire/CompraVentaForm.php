<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Libro;
use App\Models\PlanContable;
use App\Models\Opigv;
use App\Models\EstadoDocumento;
use App\Models\Estado;
use App\Models\TipoComprobantePagoDocumento;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class CompraVentaForm extends Component
{
    public $empresaId;
    public $libro, $fecha_doc, $fecha_ven, $tdoc, $ser, $num, $cod_moneda;
    public $tip_cam, $opigv, $bas_imp, $igv, $no_gravadas, $isc, $imp_bol_pla, $otro_tributo;
    public $precio, $glosa, $mon1, $mon2, $mon3;
    public $cc1, $cc2, $cc3, $fecha_emod, $tdoc_emod, $ser_emod, $num_emod;
    public $fec_emi_detr, $num_const_der, $tiene_detracc, $mont_detracc;
    public $ref_int1, $ref_int2, $ref_int3, $estado_doc, $estado;

    public $libros, $opigvs, $estado_docs, $estados, $ComprobantesPago;
    public $correntistaData;
    public $usuario = [];
    public $cnta1 = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta2 = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta3 = ['cuenta' => '', 'DebeHaber' => null];
    public $cta_otro_t = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta_precio = ['cuenta' => '', 'DebeHaber' => null];
    public $cta_detracc = ['cuenta' => '', 'DebeHaber' => null];
    public $porcentaje;


    public function mount()
    {
        $this->libros = Libro::all();
        $this->opigvs = Opigv::all();
        $this->estado_docs = EstadoDocumento::all();
        $this->estados = Estado::all()->map(function ($estado) {
            // Verificar que los estados se obtienen correctamente
            Log::info('Estado cargado: ', ['N' => $estado->N, 'Descripcion' => $estado->DESCRIPCION]);
            return $estado;
        });
        $this->ComprobantesPago = TipoComprobantePagoDocumento::all();
        $this->usuario = Auth::user();
    }

    #[On('correntistaEncontrado')]
    public function handleCorrentistaEncontrado($data)
    {
        Log::info('Correntista data received in CompraVentaForm: ', $data);
        $this->correntistaData = $data;
    }

    #[On('tipoCambioEncontrado')]
    public function handleTipoCambioEncontrado($data)
    {
        Log::info('El tipo de cambio encontrado es: ', $data);
        $this->tip_cam = is_numeric($data['precio_compra']) ? round((float)$data['precio_compra'], 2) : 0.00;
    }



    public function updated()
    {   $this->mon1 = $this->bas_imp;
        $this->calcularIgv();
        $this->calcularPrecio();
    }

    public function calcularIgv()
    {
        
        $this->igv = round(($this->bas_imp * $this->porcentaje) / 100, 2);
             
        
    }

    public function calcularPrecio()
    {
        $this->precio = round(($this->bas_imp ?: 0) + ($this->igv ?: 0) + ($this->isc ?: 0) + ($this->imp_bol_pla ?: 0) + ($this->otro_tributo ?: 0), 2);
   
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

    private function agregarDestinos($cuenta, $monto, $cc, $ref)
    {
        // Realizar consulta para obtener destinos
        $destinos = PlanContable::select('Dest1D', 'Dest1H', 'Dest2D', 'Dest2H')
            ->where('CtaCtable', $cuenta)
            ->first();

        Log::info('Consulta de destinos para la cuenta: ' . $cuenta, ['destinos' => $destinos]);

        $resultados = [];
        if ($destinos) {
            $destinosArray = $destinos->toArray();
            foreach ($destinosArray as $key => $dest) {
                if (trim($dest) !== '') {
                    $DebeHaber = ($key == 'Dest1D' || $key == 'Dest2D') ? 1 : 2;
                    $resultados[] = [
                        'cuenta' => $dest,
                        'DebeHaber' => $DebeHaber,
                        'monto' => $monto,
                        'cc' => $cc,
                        'ref' => $ref
                    ];
                }
            }
        }
        return $resultados;
    }


    public function submit()
    {
        // Emitir el evento 'dataSubmitted' con los datos del formulario
        $validatedData = $this->validate([
            'correntistaData' => 'required',
            'libro' => 'required',
            'fecha_doc' => 'required|date',
            'fecha_ven' => 'required|date',
            'num' => 'required',
            'tdoc' => 'required',
            'cod_moneda' => 'required|in:PEN,USD',
            'opigv' => 'required',
            'bas_imp' => 'required',
            'igv' => 'required',
            'cnta_precio.cuenta' => 'required',
            'glosa' => 'required',
            'cnta1.cuenta' => 'required',
            'mon1' => 'required',
            'estado_doc' => 'required',
            'estado' => 'required|integer',
            'ser' => 'nullable',
            'tip_cam' => 'nullable',
            'no_gravadas' => 'nullable',
            'isc' => 'nullable',
            'imp_bol_pla' => 'nullable',
            'otro_tributo' => 'nullable',
            'precio' => 'required',
            'mon2' => 'nullable',
            'mon3' => 'nullable',
            'cc1' => 'nullable',
            'cc2' => 'nullable',
            'cc3' => 'nullable',
            'cta_otro_t.cuenta' => 'nullable',
            'fecha_emod' => 'nullable',
            'tdoc_emod' => 'nullable',
            'ser_emod' => 'nullable',
            'num_emod' => 'nullable',
            'fec_emi_detr' => 'nullable',
            'num_const_der' => 'nullable',
            'tiene_detracc' => 'nullable',
            'cta_detracc.cuenta' => 'nullable',
            'mont_detracc' => 'nullable',
            'ref_int1' => 'nullable',
            'ref_int2' => 'nullable',
            'ref_int3' => 'nullable'
        ]);


        // Verificar el valor del estado antes de procesar
        Log::info('Estado validado: ', ['estado' => $this->estado]);


        Log::info('Data submitted: ', $validatedData);


        // Preparar $data solo con los campos que tienen valores
        $data = [];
        foreach ($validatedData as $key => $value) {
            if (!is_null($value) || $value === 0) { // Asegúrate de incluir el valor 0
                $data[$key] = $value;
            }
        }

        if ($this->libro == '01') {
            $data['cuenta_igv'] = 1673;
        }


        if (Auth::check()) {
            $data['usuario'] = [
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
            ];
        }

        if (!empty($this->empresaId)) {
            $data['empresa'] = $this->empresaId;
        }


        if (!empty($this->otro_tributo)) {
            $this->cta_otro_t['DebeHaber'] = 1;
        }

        if (empty($this->tiene_detracc) || $this->tiene_detracc === 'no') {
            $this->cnta_precio['DebeHaber'] = 2;
        }


        if (!empty($this->mont_detracc)) {
            $this->cta_detracc['DebeHaber'] = 2;
        }


        // Agregar datos del correntista
        if (!empty($this->correntistaData)) {
            $data['correntistaData'] = $this->correntistaData;
        }

        // Incluir cnta_precio si tiene un valor
        if (!empty($this->cnta_precio)) {
            $data['cnta_precio'] = $this->cnta_precio;
        }

        // Realizar cálculos de montos
        $this->calcularMontos($data);
        // Obtener y agregar destinos para las cuentas
        foreach (['cnta1', 'cnta2', 'cnta3'] as $cuentaKey) {
            $cuenta = $this->$cuentaKey;
            if (!empty($cuenta['cuenta'])) {
                // Añadir DebeHaber a la cuenta principal si tdoc no es '07'
                if ($this->tdoc != '07' && is_null($cuenta['DebeHaber'])) {
                    $cuenta['DebeHaber'] = 1;
                }
                $monto = $this->{"mon" . substr($cuentaKey, -1)};
                $cc = $this->{"cc" . substr($cuentaKey, -1)};
                $ref = $this->{"ref_int" . substr($cuentaKey, -1)};
                $cuentaDestinos = $this->agregarDestinos($cuenta['cuenta'], $monto, $cc, $ref);
                if (!empty($cuentaDestinos)) {
                    $data["{$cuentaKey}_destinos"] = $cuentaDestinos;
                }
                $data[$cuentaKey] = $cuenta;
            }
        }
        Log::info('Data with calculations and destinations: ', $data);

        // Emitir el evento 'dataSubmitted' con los datos del formulario
        $this->dispatch('dataSubmitted', $data);
    }


    public function render()
    {
        return view('livewire.compra-venta.compra-venta-form');
    }
}
