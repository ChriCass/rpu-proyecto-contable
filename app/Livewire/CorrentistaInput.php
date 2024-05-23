<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CorrentistaInput extends Component
{
    public $tdoc;
    public $correntista;
    public $errorMessage;

    public function consultarCorrentista()
    {
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
        $existe = DB::table('g_conrrentistas')->where('ruc_emisor', $ruc)->first();

        if ($existe) {
            $this->dispatch('razonSocialEncontrada', $existe->nombre_o_razon_social);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->get('https://api.migo.pe/api/v1/ruc', [
                'ruc' => $ruc
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['nombre_o_razon_social'])) {
                    $this->dispatch('razonSocialEncontrada', $data['nombre_o_razon_social']);

                    DB::table('g_conrrentistas')->insert([
                        'ruc_emisor' => $data['ruc'] ?? '',
                        'nombre_o_razon_social' => $data['nombre_o_razon_social'] ?? '',
                        'estado_del_contribuyente' => $data['estado_del_contribuyente'] ?? '',
                        'condicion_de_domicilio' => $data['condicion_de_domicilio'] ?? '',
                        'provincia' => $data['provincia'] ?? '',
                        'distrito' => $data['distrito'] ?? '',
                        'direccion' => $data['direccion'] ?? '',
                        'idt02doc' => '6'
                    ]);
                } else {
                    $this->errorMessage = 'Datos no encontrados en la API';
                }
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
            }
        }
    }

    private function consultarDNI()
    {
        if (strlen($this->correntista) != 8) {
            $this->errorMessage = 'Digite un Número de DNI válido';
            return;
        }

        $dni = $this->correntista;
        $existe = DB::table('g_conrrentistas')->where('ruc_emisor', $dni)->first();

        if ($existe) {
            $this->dispatch('razonSocialEncontrada', $existe->nombre_o_razon_social);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer oxzdu4ZBlghIaetvqYux8CocEVJABQAkptMBcpUyQVhXr5sF3vb0ABZxJF40'
            ])->get('https://api.migo.pe/api/v1/dni', [
                'dni' => $dni
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['nombre'])) {
                    $this->dispatch('razonSocialEncontrada', $data['nombre']);

                    DB::table('g_conrrentistas')->insert([
                        'ruc_emisor' => $data['dni'] ?? '',
                        'nombre_o_razon_social' => $data['nombre'] ?? '',
                        'estado_del_contribuyente' => '-',
                        'condicion_de_domicilio' => '-',
                        'provincia' => '-',
                        'distrito' => '-',
                        'direccion' => '-',
                        'idt02doc' => '1'
                    ]);
                } else {
                    $this->errorMessage = 'Datos no encontrados en la API';
                }
            } else {
                $this->errorMessage = 'Conexión no establecida con la API';
            }
        }
    }

    public function render()
    {
        return view('livewire.correntista-input');
    }
}
