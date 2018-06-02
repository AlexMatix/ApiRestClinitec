<?php

namespace App\Http\Controllers\Notas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Medicos;
use App\Notas;
use App\Consultas;

class NotasFiltroController extends ApiController
{
    public function NotasbyConsultaTipo(){

		if(isset($_GET['idMedico'])){
			$idMedico=$_GET['idMedico'];
			$medico= Medicos::findOrFail($idMedico);
			$query[] = array("idMedico","=",$medico->id);
		}

		if(isset($_GET['tipo'])){
			$tipo=$_GET['tipo'];
			$query[] = array("Tipo_nota","=",$tipo);
		}

		if(isset($_GET['idConsulta'])){
			$idConsulta=$_GET['idConsulta'];
			$consulta=Consultas::findOrFail($idConsulta);
			$query[] = array("idConsulta","=",$consulta->id);
		}

		if(empty($query))
			return $this->errorResponse("No hay datos", 404);

		$notas = Notas::where($query)->get();
		foreach ($notas as $nota) {
			$medicoN= Medicos::findOrFail($nota->idMedico);
			$consultaN=Consultas::findOrFail($nota->idConsulta);

			$newNotas[]=array(
   				'id' => $nota->id,
   				'Tipo_nota' => $nota->Tipo_nota,
   				'Diagnostico' 		 => $nota->Diagnostico,
   				'Peso'		=> $nota->Peso,
   				'Talla'		=> $nota->Talla,
   				'IMC' => $nota->IMC,
   				'SC' => $nota->SC,
   				'SVT' => $nota->SVT,
   				'FC' => $nota->FC,
   				'TR' => $nota->TR,
   				'Temperatura' => $nota->Temperatura,
   				'TA' => $nota->TA,
   				'S02' => $nota->S02,
   				'Nota' => $nota->Nota,
   				'Pronostico' => $nota->Pronostico,
   				'Medico' => array('Nombre' => $medicoN->Nombre,
   									'Apellidos' => $medicoN->Apellidos,
   									),
   				'consulta' => $consultaN,
   			);
		}
		return $this->showList($newNotas);
    }
}