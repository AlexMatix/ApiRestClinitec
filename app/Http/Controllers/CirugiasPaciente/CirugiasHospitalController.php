<?php

namespace App\Http\Controllers\CirugiasPaciente;

use App\Camas_x_piso;
use App\Centro_medico;
use App\Cirugias_x_paciente;
use App\Http\Controllers\ApiController;
use App\Medicos;
use App\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CirugiasHospitalController extends ApiController
{

    public function getLastCirugias($idCentroMedico){

      $centroMedico = Centro_medico::findOrFail($idCentroMedico);

      if(isset($_GET['Ingreso'])){
        $query[] = array('cirugias_x_pacientes.Fecha_ingreso','=',$_GET['Ingreso|']);
      }

      if(isset($_GET['Egreso'])){
        $query[] = array('cirugias_x_pacientes.Fecha_egreso','=',$_GET['Egreso']);
      }

      if(isset($_GET['Medico'])){
        $query[] = array('cirugias_x_pacientes.idCentro_medico','=',$_GET['Medico']);
        
      }
      if(isset($_GET['Paciente'])){
        $query[] = array('cirugias_x_pacientes.idPaciente','=',$_GET['Paciente']);
      }
      if(!isset($_GET['Paciente']) && !isset($_GET['Medico']) && !isset($_GET['date'])){
          $query[] = array('cirugias_x_pacientes.Estado', '=', Cirugias_x_paciente::EN_PROCESO);
          $query[] = array('cirugias_x_pacientes.idCentro_medico', '=' , $idCentroMedico);
      }
      $result = DB::table('cirugias_x_pacientes')
                  ->join('pacientes','cirugias_x_pacientes.idPaciente', '=', 'pacientes.id')
                  ->join('medicos', 'cirugias_x_pacientes.idMedico', '=', 'medicos.id')
                  ->join('cirugias', 'cirugias_x_pacientes.idCirugia', '=', 'cirugias.id')
                  ->where($query)
                  ->select('cirugias_x_pacientes.Fecha_ingreso', 'cirugias_x_pacientes.Fecha_egreso', 'cirugias.Nombre', 'cirugias.Riesgos as Riesgo', 'cirugias.Costos as Riesgo', 'cirugias.Duracion', 'pacientes.Nombre as Nombre_paciente','pacientes.Apellidos as Apellidos_paciente', 'medicos.Nombre as Nombre_medico', 'medicos.Apellidos as Apellido_medico')
                  ->get();
      return $this->showList($result, 200);
    }   
}
