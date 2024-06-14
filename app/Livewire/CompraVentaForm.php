<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\Opigv;
use App\Models\EstadoDocumento;
use App\Models\Estado;
use Illuminate\Support\Facades\Log;
class CompraVentaForm extends Component
{   public $libro, $fecha_doc, $fecha_ven, $id_type, $ser, $num, $cod_moneda;
    public $tip_cam, $opigv, $bas_imp, $igv, $no_gravadas, $isc, $imp_bol_pla, $otro_tributo;
    public $precio, $glosa, $cnta1, $cnta2, $cnta3, $cnta_precio, $mon1, $mon2, $mon3;
    public $cc1, $cc2, $cc3, $cta_otro_t, $fecha_emod, $tdoc_emod, $ser_emod, $num_emod;
    public $fec_emi_detr, $num_const_der, $tiene_detracc, $cta_detracc, $mont_detracc;
    public $ref_int1, $ref_int2, $ref_int3, $estado_doc, $estado;

    public $libros, $opigvs, $estado_docs, $estados;
 
    public function mount()
{
    $this->libros = Libro::all();
    $this->opigvs = Opigv::all();
    $this->estado_docs = EstadoDocumento::all();
    $this->estados = Estado::all();
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

 // Emitir el evento 'dataSubmitted' con los datos del formulario
 $this->dispatch('dataSubmitted', $data);
}

    public function render()
    {
        return view('livewire.compra-venta-form' );
    }
}
