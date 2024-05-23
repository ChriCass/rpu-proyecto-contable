<?php

namespace App\Livewire;

use Livewire\Component;

class InputRespuestaCorrentista extends Component
{
    public $razonSocial;

    protected $listeners = ['razonSocialEncontrada' => 'setRazonSocial'];

    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    public function render()
    {
        return view('livewire.input-respuesta-correntista');
    }
}
