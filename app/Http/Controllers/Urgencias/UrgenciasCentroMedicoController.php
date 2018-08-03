<?php

namespace App\Http\Controllers\Urgencias;

use App\Ingresos;
use App\Pacientes;
use App\Urgencias;
use App\Camas_x_piso;
use App\Centro_medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;

class UrgenciasCentroMedicoController extends ApiController
{
	public function DardeAltaUrgencia()
	{
		$idPaciente = $_GET['idPaciente'];
		$paciente = Pacientes::findOrFail($idPaciente);
		if($paciente->Estado!=Pacientes::URGENCIA)
			return $this->errorResponse("Paciente ya no se encuentra en Urgencias", 500);

		$urgencia = Urgencias::where("idPaciente", "=", $paciente->id)->orderBy("id","desc")->limit(1)->get();
		$urgencia = $urgencia[0];
		$urgencia->Fecha_egreso = date("Y-m-d");

		$paciente->Estado = Pacientes::ACTIVO;
		try {
			$paciente->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}

		try {
			$urgencia->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}	
		return $this->succesMessaje("Exito",200);
	}

	public function UrgenciasXCentroMedicoAll()
	{
		$idCentroMedico= $_GET['idCentroMedico'];
		$centroMedico = Centro_medico::findOrFail($idCentroMedico);

		$query = [['urgencias.idCentro_medico','=',$idCentroMedico],['urgencias.Estado','=',Urgencias::ACTIVO]];

		if(isset($_GET['date']))
			$query[]=array('urgencias.Fecha_ingreso','=',$_GET['date']);
        $result = DB::table('urgencias')
                  ->join('pacientes', 'urgencias.idPaciente', '=', 'pacientes.id')
                  ->where($query)
                  //->select('*')
                  ->get();
		//print_r($result);exit;
      if(!$this->isValidData($result))
            return $this->errorResponse("No hay data",404);
      return $this->showList($result, 200);
	}
}
