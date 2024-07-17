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
    public $fecha_vaucher;

    public $libros, $opigvs, $estado_docs, $estados, $ComprobantesPago;
    public $correntistaData;
    public $usuario = [];
    public $cnta1 = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta2 = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta3 = ['cuenta' => '', 'DebeHaber' => null];
    public $cta_otro_t = ['cuenta' => '', 'DebeHaber' => null];
    public $cnta_precio = ['cuenta' => '', 'DebeHaber' => null, 'precioTotal' => null];
    public $cta_detracc = ['cuenta' => '', 'DebeHaber' => null];
    public $porcentaje = '';
    public $montoDolares = [];
    public $igv_manual = false;

    protected $rules = [
        'bas_imp' => 'nullable|numeric',
        'igv' => 'nullable|numeric',
        'isc' => 'nullable|numeric',
        'imp_bol_pla' => 'nullable|numeric',
        'otro_tributo' => 'nullable|numeric',
    ];


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
        $this->tip_cam = is_numeric($data['precio_venta']) ? round((float)$data['precio_venta'], 2) : 0.00;
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName == 'igv') {
            $this->igv_manual = true;
        } elseif ($propertyName == 'porcentaje') {
            $this->igv_manual = false;
            $this->calcularIgv();
        } else {
            if (!$this->igv_manual) {
                $this->calcularIgv();
            }
            $this->calcularPrecio();
        }
    }



    public function calcularIgv()
    {
        if ($this->bas_imp && $this->porcentaje) {
            $this->igv = round(($this->bas_imp * $this->porcentaje) / 100, 2);
        } else {
            $this->igv = null;
        }
    }


    public function calcularPrecio()
    {
        $this->precio = round(($this->bas_imp ?: 0) + ($this->igv ?: 0) + ($this->isc ?: 0) + ($this->imp_bol_pla ?: 0) + ($this->otro_tributo ?: 0), 2);
    }

    private function calcularMontos(&$data)
    {

        // Guardar los montos originales en dólares antes de la conversión
        $this->montoDolares = [
            'mon1' => $this->mon1,
            'mon2' => $this->mon2,
            'mon3' => $this->mon3,
            'igv' => $this->igv,
            'otro_tributo' => $this->otro_tributo,
            'bas_imp' => $this->bas_imp,
        ];

        $this->dispatch('montoDolaresGuardado', $this->montoDolares);

        Log::info('Montos en dólares antes de la conversión:', [
            'mon1' => $this->montoDolares['mon1'],
            'mon2' => $this->montoDolares['mon2'],
            'mon3' => $this->montoDolares['mon3'],
            'igv' => $this->montoDolares['igv'],
            'otro_tributo' => $this->montoDolares['otro_tributo'],
            'bas_imp' => $this->montoDolares['bas_imp']
        ]);

        // Realizar cálculos según la moneda
        if ($this->cod_moneda == 'USD') {
            $data['mon1'] = round($this->mon1 * $this->tip_cam, 2);
            $data['mon2'] = round($this->mon2 * $this->tip_cam, 2);
            $data['mon3'] = round($this->mon3 * $this->tip_cam, 2);
            $data['igv'] = round($this->igv * $this->tip_cam, 2);
            $data['otro_tributo'] = round($this->otro_tributo * $this->tip_cam, 2);
            $data['bas_imp'] = round($this->bas_imp * $this->tip_cam, 2);

            Log::info('Montos después de la conversión:', [
                'mon1' => $data['mon1'],
                'mon2' => $data['mon2'],
                'mon3' => $data['mon3'],
                'igv' => $data['igv'],
                'otro_tributo' => $data['otro_tributo'],
                'bas_imp' => $data['bas_imp']
            ]);
        }
    }

    private function agregarDestinos($cuenta, $monto, $cc, $ref, $libro)
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
                    // Asignar DebeHaber en función de libro
                    if ($libro != '01') {
                        $DebeHaber = ($key == 'Dest1D' || $key == 'Dest2D') ? 1 : 2;
                    } else {
                        $DebeHaber = ($key == 'Dest1D' || $key == 'Dest2D') ? 2 : 1;
                    }
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
    

    public function validacionesLibros(&$data)
    {
        if ($this->libro == '01') {
            if ($this->tdoc != '07') {
                Log::info('Libro es 01 y tdoc no es 07.');
    
                $data['cuenta_igv'] = [
                    'DebeHaber' => 1,
                    'valor' => 1673,
                    'igv' => $this->igv,
                ];
    
                Log::info('Asignado cuenta IGV:', $data['cuenta_igv']);
    
                if (!empty($this->otro_tributo)) {
                    $data['cta_otro_t']['DebeHaber'] = 1;
                    Log::info('Otro tributo no está vacío, asignado cta_otro_t DebeHaber a 1.');
                }
    
                if (empty($this->tiene_detracc) || $this->tiene_detracc === 'no') {
                    $data['cnta_precio']['DebeHaber'] = 2;
                    $data['cnta_precio']['precioTotal'] = $this->precio;
    
                    Log::info('No tiene detracción o tiene_detracc es "no". Asignado cnta_precio:', [
                        'DebeHaber' => $data['cnta_precio']['DebeHaber'],
                        'precioTotal' => $data['cnta_precio']['precioTotal']
                    ]);
                } else {
                    if (!empty($this->mont_detracc)) {
                        $data['cta_detracc']['DebeHaber'] = 2;
                        Log::info('MontDetracc no está vacío. Asignado cta_detracc DebeHaber a 2.');
                    }
                }
            } else {
                Log::info('Libro es 01 pero tdoc es 07.');
    
                $data['cuenta_igv'] = [
                    'DebeHaber' => 2,
                    'valor' => 1673,
                    'igv' => $this->igv,
                ];
    
                Log::info('Asignado cuenta IGV en else (tdoc es 07):', $data['cuenta_igv']);
    
                if (!empty($this->otro_tributo)) {
                    $data['cta_otro_t']['DebeHaber'] = 2;
                    Log::info('Otro tributo no está vacío, asignado cta_otro_t DebeHaber a 2.');
                }
    
                if (empty($this->tiene_detracc) || $this->tiene_detracc === 'no') {
                    $data['cnta_precio']['DebeHaber'] = 1;
                    $data['cnta_precio']['precioTotal'] = $this->precio;
    
                    Log::info('No tiene detracción o tiene_detracc es "no" en else (tdoc es 07). Asignado cnta_precio:', [
                        'DebeHaber' => $data['cnta_precio']['DebeHaber'],
                        'precioTotal' => $data['cnta_precio']['precioTotal']
                    ]);
                } else {
                    if (!empty($this->mont_detracc)) {
                        $data['cta_detracc']['DebeHaber'] = 1;
                        Log::info('MontDetracc no está vacío en else (tdoc es 07). Asignado cta_detracc DebeHaber a 1.');
                    }
                }
            }
        } else {
            Log::info('Libro no es 01.');
    
            $data['cuenta_igv'] = [
                'DebeHaber' => 2,
                'valor' => 40111,
                'igv' => $this->igv,
            ];
    
            Log::info('Asignado cuenta IGV en else:', $data['cuenta_igv']);
    
            if (!empty($this->otro_tributo)) {
                $data['cta_otro_t']['DebeHaber'] = 2;
                Log::info('Otro tributo no está vacío, asignado cta_otro_t DebeHaber a 2.');
            }
    
            if (empty($this->tiene_detracc) || $this->tiene_detracc === 'no') {
                $data['cnta_precio']['DebeHaber'] = 1;
                $data['cnta_precio']['precioTotal'] = $this->precio;
    
                Log::info('No tiene detracción o tiene_detracc es "no" en else. Asignado cnta_precio:', [
                    'DebeHaber' => $data['cnta_precio']['DebeHaber'],
                    'precioTotal' => $data['cnta_precio']['precioTotal']
                ]);
            } else {
                if (!empty($this->mont_detracc)) {
                    $data['cta_detracc']['DebeHaber'] = 1;
                    Log::info('MontDetracc no está vacío en else. Asignado cta_detracc DebeHaber a 1.');
                }
            }
        }
    }
    



    public function submit()
    {
        // Emitir el evento 'dataSubmitted' con los datos del formulario
        $validatedData = $this->validate([
            'correntistaData' => 'required',
            'libro' => 'required',
            'fecha_doc' => 'required|date',
            'fecha_ven' => 'required|date',
            'fecha_vaucher' => 'required|date',
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

        if ($this->tiene_detracc === 'si') {
            $rules['cta_detracc.cuenta'] = 'required';
            $rules['mont_detracc'] = 'required';
        };


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



        if (Auth::check()) {
            $data['usuario'] = [
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
            ];
        }

        if (!empty($this->empresaId)) {
            $data['empresa'] = $this->empresaId;
        }






        // Agregar datos del correntista
        if (!empty($this->correntistaData)) {
            $data['correntistaData'] = $this->correntistaData;
        }



        $this->validacionesLibros($data);

        // Realizar cálculos de montos
        $this->calcularMontos($data);
        // Obtener y agregar destinos para las cuentas
 

 foreach (['cnta1', 'cnta2', 'cnta3'] as $cuentaKey) {
    $cuenta = $this->$cuentaKey;
    if (!empty($cuenta['cuenta'])) {
        // Determinar DebeHaber en función de tdoc y libro ///aqui se controla tanto los 1 en compras y el 2 en ventas, SOLO EN LAS CUENTAS->REVISAR CONDICIONAL PARA SIGUIENTES
        if (($this->libro == '01' && $this->tdoc != '07') || ($this->libro != '01' && $this->tdoc == '07')) {
            $cuenta['DebeHaber'] = 1;
        } else {
            if (is_null($cuenta['DebeHaber'])) {
                $cuenta['DebeHaber'] = 2;
            }
        }

        $monto = $this->{"mon" . substr($cuentaKey, -1)};
        $cc = $this->{"cc" . substr($cuentaKey, -1)};
        $ref = $this->{"ref_int" . substr($cuentaKey, -1)};
        $cuentaDestinos = $this->agregarDestinos($cuenta['cuenta'], $monto, $cc, $ref, $this->tdoc, $this->libro);
        if (!empty($cuentaDestinos)) {
            $data["{$cuentaKey}_destinos"] = $cuentaDestinos;
        }
        $data[$cuentaKey] = $cuenta;
    }
}

        

        // Verificar si tiene detracción y restar el monto de detracción del precio
        if (array_key_exists('tiene_detracc', $data) && $data['tiene_detracc'] === 'si' && !empty($data['mont_detracc'])) {
            $data['precio'] -= $data['mont_detracc'];
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
