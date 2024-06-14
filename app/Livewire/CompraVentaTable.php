<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
class CompraVentaTable extends Component
{   public $data = [];
    public $rows = [];
    #[On('dataSubmitted')]
    public function handleDataSubmitted($data)
    {
        $this->data = $data;
        Log::info('Data received in CompraVentaTable: ', $this->data);
    }

 

     
    public function render()
    {
        return view('livewire.compra-venta-table' );
    }
}
