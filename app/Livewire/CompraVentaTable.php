<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class CompraVentaTable extends Component
{    public $rows = [];

    protected $listeners = ['addRow'];

    public function addRow($data)
    {
        $this->rows[] = $data;
    }

    public function insertData()
    {
        foreach ($this->rows as $row) {
            DB::table('c_tabla')->insert([
                'Mes' => date('m', strtotime($row['fecha_doc'])),
                'Libro' => $row['libro'],
                'Vou' => $row['num'],
                'Fecha_Vou' => $row['fecha_doc'],
                'GlosaGeneral' => $row['glosa'],
                'Corrent' => $row['id_type'],
                'TDoc' => $row['id_type'],
                'Ser' => $row['ser'],
                'Num' => $row['num'],
                'Cnta' => $row['cnta1'],
                'DebeHaber' => 1,
                'MontSoles' => $row['mon1'],
                'MontDolares' => $row['mon1'] * $row['tip_cam'],
                'TipCam' => $row['tip_cam'],
                'GlosaEpecifica' => $row['glosa'],
                'CC' => $row['cc1'],
                'TipMedioDePago' => null,
                'Fecha_Doc' => $row['fecha_doc'],
                'Fecha_Ven' => $row['fecha_ven'],
                'ADuaDsi' => null,
                'TOpIgv' => $row['opigv'],
                'BasImp' => $row['bas_imp'],
                'IGV' => $row['igv'],
                'NoGravadas' => $row['no_gravadas'],
                'ISC' => $row['isc'],
                'ImpBolPla' => $row['imp_bol_pla'],
                'OtroTributo' => $row['otro_tributo'],
                'CodMoneda' => $row['cod_moneda'],
                'FechaEMod' => $row['fecha_emod'],
                'TDocEMod' => $row['tdoc_emod'],
                'SerEMod' => $row['ser_emod'],
                'CodDepenDUAoDSI' => null,
                'NumEMod' => $row['num_emod'],
                'FecEmiDetr' => $row['fec_emi_detr'],
                'NumConstDer' => $row['num_const_der'],
                'MarRet' => null,
                'ClasBienes' => null,
                'IdenContrat' => null,
                'Err1' => null,
                'Err2' => null,
                'Err3' => null,
                'Err4' => null,
                'RefInt' => $row['ref_int1'],
                'IdEstadoDoc' => $row['estado_doc'],
                'Estado' => $row['estado'],
                'Usuario' => 1
            ]);
        }

        // Emitir evento para mostrar la alerta
        $this->emit('showAlert', 'Datos insertados correctamente.');
        // Resetear la tabla
        $this->rows = [];
    }

    public function render()
    {
        return view('livewire.compra-venta-table');
    }
}
