<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use App\Models\Empresa;
class CompraVentaTable extends Component
{   public $data = [];
    public $empresa;
    public $rows = [];
    #[On('dataSubmitted')]
    public function handleDataSubmitted($data)
    {
        $this->data = $data;
        Log::info('Data received in CompraVentaTable: ', $this->data);
    }

    public function mount()
    {
         $this->empresa = Empresa::find(1);
     
    }

     
    public function render()
    {
        return view('livewire.compra-venta-table', ['data'=>$this->data] );
        
    }
}
