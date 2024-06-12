<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Correntista;
use Illuminate\Support\Facades\Log;

class CorrentistaInput extends Component
{
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

        Log::info('Consultando con tipo de documento: ' . $this->tdoc . ' y número: ' . $this->correntista);

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
            Log::info('Consultando RUC API con número: ' . $ruc);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/ruc', [
                'ruc' => $ruc,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            Log::info('Código de respuesta de RUC API: ' . $response->status());
            Log::info('Cuerpo de la respuesta de RUC API: ' . $response->body());

            if ($response->successful()) {
                $data = $response->json();
                $this->responseData = json_encode($data, JSON_PRETTY_PRINT);
                Log::info('Respuesta de RUC API: ' . $this->responseData);
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
                Log::error('Error en la respuesta de RUC API: ' . $response->body());
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
            Log::error('Excepción al conectar con la RUC API: ' . $e->getMessage());
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
            Log::info('Consultando DNI API con número: ' . $dni);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/dni', [
                'dni' => $dni,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            Log::info('Código de respuesta de DNI API: ' . $response->status());
            Log::info('Cuerpo de la respuesta de DNI API: ' . $response->body());

            if ($response->successful()) {
                $data = $response->json();
                $this->responseData = json_encode($data, JSON_PRETTY_PRINT);
                Log::info('Respuesta de DNI API: ' . $this->responseData);
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
                Log::error('Error en la respuesta de DNI API: ' . $response->body());
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
            Log::error('Excepción al conectar con la DNI API: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.correntista-input');
    }
}
