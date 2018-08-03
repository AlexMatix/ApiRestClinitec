<?php

namespace App\Http\Controllers\Ingresos;

use App\Ingresos; 
use App\Pacientes;
use App\Camas_x_piso;
use App\Centro_medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;

class IngresosFiltroController extends ApiController
{
    public function getAllPacients(){
        $idCentroMedico= $_GET['idCentroMedico'];
        $centroMedico = Centro_medico::findOrFail($idCentroMedico);

        $result = DB::table('ingresos')
                  ->join('pacientes', 'ingresos.idPaciente', '=', 'pacientes.id')
                  ->join('camas_x_piso', 'ingresos.idCama', '=', 'camas_x_piso.id')
                  ->where([['ingresos.idCentro_medico','=',$idCentroMedico],['ingresos.Estado','=',Ingresos::ACTIVO]])
                  //->select('*')
                  ->get();
        //print_r($result);exit;
      if(!$this->isValidData($result))
            return $this->errorResponse("No hay data",404);
      return $this->showList($result, 200);
    }
    
    public function DardeAltaIngresado()
	{
		$idPaciente = $_GET['idPaciente'];
		$paciente = Pacientes::findOrFail($idPaciente);
		if($paciente->Estado!=Pacientes::INGRESADO)
			return $this->errorResponse("Paciente ya no se encuentra Ingresado", 500);

		$ingreso = Ingresos::where("idPaciente", "=", $paciente->id)->orderBy("id","desc")->limit(1)->get();
		$ingreso = $ingreso[0];
		$ingreso->Fecha_egreso = date("Y-m-d");
		$cama = Camas_x_piso::findOrFail($ingreso->idCama);
		$cama->Ocupado = Camas_x_piso::CAMA_LIBRE;

		$paciente->Estado=Pacientes::ACTIVO;
		try {
			$paciente->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}
		try {
			$cama->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}
		try {
			$ingreso->save();
		} catch (QueryException $e) {
			return $this->errorResponse("Error al actualizar los datos", 500);
		}		
		return $this->succesMessaje("Exito",200);
	}
}
