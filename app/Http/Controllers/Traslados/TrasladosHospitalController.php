<?php

namespace App\Http\Controllers\Traslados;

use App\Centro_medico;
use App\Http\Controllers\ApiController;
use App\Traslados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrasladosHospitalController extends ApiController
{
    
    public function getLastTraslados($idCentroMedico){

        $centroMedicos = Centro_medico::findOrFail($idCentroMedico);

        $query[] = array("traslados.idCentro_medico","=",$idCentroMedico);

        if(isset($_GET['Fecha'])){
            $query[] = array("traslados.Fecha_traslado","=",$_GET['Fecha']);
        }

        if(isset($_GET['Paciente'])){
            $query[] = array("traslados.idPaciente","=",$_GET['Paciente']);
        }

        $traslados = DB::table('traslados')
                        ->join('camas_x_piso','traslados.idCama', '=', 'camas_x_piso.id')
                        ->join('pacientes', 'traslados.idPaciente', '=', 'pacientes.id')
                        ->where($query)
                        ->select('traslados.Fecha_traslado as Fecha','camas_x_piso.Piso', 'camas_x_piso.Seccion','pacientes.Nombre','pacientes.Apellidos')
                        ->get();

        return $this->showList($traslados);
    }
}
