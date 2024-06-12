<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\Opigv;
use App\Models\EstadoDocumento;
use App\Models\Estado;
use App\Http\Requests\CompraVentaRequest;
class CompraVentaForm extends Component
{   public $libro, $fecha_doc, $fecha_ven, $id_type, $ser, $num, $cod_moneda;
    public $tip_cam, $opigv, $bas_imp, $igv, $no_gravadas, $isc, $imp_bol_pla, $otro_tributo;
    public $precio, $glosa, $cnta1, $cnta2, $cnta3, $cnta_precio, $mon1, $mon2, $mon3;
    public $cc1, $cc2, $cc3, $cta_otro_t, $fecha_emod, $tdoc_emod, $ser_emod, $num_emod;
    public $fec_emi_detr, $num_const_der, $tiene_detracc, $cta_detracc, $mont_detracc;
    public $ref_int1, $ref_int2, $ref_int3, $estado_doc, $estado;

    public function submit(CompraVentaRequest $request)
    {
        $validatedData = $request->validated();

        // Emit an event to the table component to add a new row
        $this->emit('addRow', $validatedData);

        // Show success message
        session()->flash('message', 'Datos procesados correctamente.');
    }

    public function mount()
{
    $this->libro = Libro::all();
    $this->opigv = OpIgv::all();
    $this->estado_doc = EstadoDocumento::all();
    $this->estado = Estado::all();
}

    public function render()
    {
        return view('livewire.compra-venta-form', [
            'libro' => Libro::all(),
            'opigv' => Opigv::all(),
            'estado_doc' => EstadoDocumento::all(),
            'estado' => Estado::all(),
        ]);
    }
}
