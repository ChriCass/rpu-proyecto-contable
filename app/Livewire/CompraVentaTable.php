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
class CompraVentaTable extends Component
{   public $data = [];
    public $empresa;
    public $rows = [];
    public $libros, $opigvs, $estado_docs, $estados, $ComprobantesPago;
    #[On('dataSubmitted')]
    public function handleDataSubmitted($data)
    {
        $this->data = $data;
        Log::info('Data received in CompraVentaTable: ', $this->data);
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
     
    public function render()
    {
        return view('livewire.compra-venta.compra-venta-table', ['data'=>$this->data, 'libros' => $this->libros,
            'opigvs' => $this->opigvs,
            'estado_docs' => $this->estado_docs,
            'estados' => $this->estados,
            'ComprobantesPago'=> $this->ComprobantesPago
            ] );
        
    }
}
