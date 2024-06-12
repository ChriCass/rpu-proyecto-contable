<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Correntista;
use Illuminate\Support\Facades\Log;

class CorrentistaInput extends Component
{   public $data;
   public $tdoc;
    public $correntista;
    public $errorMessage;
    public $responseData;

    public function consultarCorrentista()
    {
        $this->reset('errorMessage', 'responseData');

        $this->validate([
            'tdoc' => 'required',
            'correntista' => 'required',
        ]);

        if ($this->tdoc == 'RUC') {
            $this->consultarRUC();
        } elseif ($this->tdoc == 'DNI') {
            $this->consultarDNI();
        } else {
            $this->errorMessage = 'Tipo de Documento no válido';
        }
    }

    private function consultarRUC()
    {
        if (strlen($this->correntista) != 11) {
            $this->errorMessage = 'Digite un Número de RUC válido';
            return;
        }

        $ruc = $this->correntista;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/ruc', [
                'ruc' => $ruc,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            if ($response->successful()) {
                $this->responseData = $response->json();
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
        }
    }

    private function consultarDNI()
    {
        if (strlen($this->correntista) != 8) {
            $this->errorMessage = 'Digite un Número de DNI válido';
            return;
        }

        $dni = $this->correntista;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/dni', [
                'dni' => $dni,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            if ($response->successful()) {
                $this->responseData = $response->json();
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.correntista-input');
    }
}
