<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Correntista;
use Illuminate\Support\Facades\Log;

class CorrentistaInput extends Component
{
    public $data;
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

        // Log para la consulta a la base de datos
        Log::info("Consultando la base de datos para el correntista: {$this->correntista}");

        $correntistaConsulta = Correntista::where('nombre_o_razon_social', $this->correntista)->first();

        if ($correntistaConsulta) {
            Log::info("Correntista encontrado en la base de datos: ", $correntistaConsulta->toArray());
            $this->responseData = $correntistaConsulta;
            $this->dispatch('correntistaEncontrado', $this->responseData);
        } else {
            Log::info("Correntista no encontrado en la base de datos, procediendo a consultar la API");

            if ($this->tdoc == 'RUC') {
                $this->consultarRUC();
            } elseif ($this->tdoc == 'DNI') {
                $this->consultarDNI();
            } else {
                $this->errorMessage = 'Tipo de Documento no válido';
            }
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
            Log::info("Consultando RUC en la API para el RUC: {$ruc}");

            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/ruc', [
                'ruc' => $ruc,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            if ($response->successful()) {
                Log::info("Respuesta exitosa de la API para el RUC: ", $response->json());
                $this->responseData = $response->json();
                $this->dispatch('correntistaEncontrado', $this->responseData);
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
                Log::error("Fallo en la conexión con la API para el RUC: {$ruc}");
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
            Log::error("Error al conectar con la API para el RUC: {$ruc} - Error: " . $e->getMessage());
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
            Log::info("Consultando DNI en la API para el DNI: {$dni}");

            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->post('https://api.migo.pe/api/v1/dni', [
                'dni' => $dni,
                'token' => 'oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ]);

            if ($response->successful()) {
                Log::info("Respuesta exitosa de la API para el DNI: ", $response->json());
                $this->responseData = $response->json();
                $this->dispatch('correntistaEncontrado', $this->responseData);
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
                Log::error("Fallo en la conexión con la API para el DNI: {$dni}");
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al conectar con la API: ' . $e->getMessage();
            Log::error("Error al conectar con la API para el DNI: {$dni} - Error: " . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.correntista-input');
    }
}
