<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class TipoCambioSunat extends Component
{
    public $tipoCambio;
    public $errorMessage;

    public function consultaApiCambio()
    {
        try {
            Log::info("Consultando el último tipo de cambio de SUNAT");

            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/exchange/latest', [
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            if ($response->successful()) {
                // Decodifica el JSON a un array asociativo de PHP
                $this->tipoCambio = $response->json();
                $this->dispatch('tipoCambioEncontrado', $this->tipoCambio);
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
                Log::error("Fallo en la conexión con la API.");
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Ha ocurrido un error: ' . $e->getMessage();
            Log::error('Error: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.tipo-cambio-sunat');
    }
}
