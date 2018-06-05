<?php

namespace App\Http\Controllers\VacunasPaciente;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Consultas;
use App\Vacunas_x_paciente;
use App\Centro_medico;
use App\Pacientes;

class VacunasFiltroController extends ApiController
{
    public function VacunasFiltro(){
    	$idCentroMedico = $_GET['idCentroMedico'];
    	$centroMedico= Centro_medico::findOrFail($idCentroMedico);

		if(isset($_GET['idPaciente'])){
			$idPaciente=$_GET['idPaciente'];
			$paciente= Pacientes::findOrFail($idPaciente);
			$query[] = array("idPaciente","=",$paciente->id);
		}

		if(isset($_GET['fecha_aplicacion'])){
			$fecha_aplicacion=$_GET['fecha_aplicacion'];
			$query[] = array("Fecha_aplicacion","=",$fecha_aplicacion);
		}

		if(isset($_GET['idConsulta'])){
			$idConsulta=$_GET['idConsulta'];
			$consulta=Consultas::findOrFail($idConsulta);
			$query[] = array("idConsulta","=",$consulta->id);
		}

		if(empty($query))
			return $this->errorResponse("No hay datos", 404);
		$query[]=["idCentro_medico","=",$centroMedico->id];

		$vacunas = Vacunas_x_paciente::where($query)->get();
		return $this->showList($vacunas);
    }
}
