<?php

namespace App\Livewire;

use Livewire\Component;

class AlertMessage extends Component
{    public $showAlert = false;
    public $message = '';

    protected $listeners = ['showAlert'];

    public function showAlert($message)
    {
        $this->message = $message;
        $this->showAlert = true;
    }

    public function render()
    {
        return view('livewire.compra-venta.alert-message');
    }
}
