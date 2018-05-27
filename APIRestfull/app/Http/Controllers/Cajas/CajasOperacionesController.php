<?php

namespace App\Http\Controllers\Cajas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Centro_medico;
use App\Cirugias_x_paciente;
use App\Consultas;
use App\Vacunas_x_paciente;
use App\Medicos;
use App\Pacientes;
use App\Vacunas;
use App\Cirugias;

class CajasOperacionesController extends ApiController
{
    //
    public function CajasCalculoTotal($date){

    	$idCentroMedico=$_GET['idCentroMedico'];
    	$centroMedico= Centro_medico::findOrFail($idCentroMedico);
   		
    	$idpaciente= $_GET['idpaciente'];
   		$paciente= Pacientes::findOrFail($idpaciente);
   		$consultas = Consultas::where([["idCentro_medico","=",$centroMedico->id],["Fecha","=","$date"],["idPaciente","=",$paciente->id]])->get();
   		$total = 0;	
   		foreach ($consultas as $consulta) {
   			if(empty($consulta->id))
   				break;
   			$medico = Medicos::findOrFail($consulta->idMedico);
   			$newConsulta[]=array('id' => $consulta->id, 
   								'Fecha' => $consulta->Fecha,
   								'Costo' => $consulta->Costo,
   								'Medico' => array(
   									'id' => $medico->id,
   									'Nombre' => $medico->Nombre,
   									'Apellidos' => $medico->Apellidos
   								),
   							);
   			$total += $consulta->Costo;

   			$vacunas = Vacunas_x_paciente::where("idConsulta","=",$consulta->id)->get();

   			foreach ($vacunas as $vacuna) {
   				if(empty($vacuna))
   					break;

   				$v = Vacunas::findOrFail($vacuna->idVacuna);
   				$newVacunas[]=array('Vacuna' => array('Nombre' => $v->Nombre,
   													'Costo' => $v->Costo, 
   					
   					), 
   				);
   				$total+=$v->Costo;
   			}
   		}

   		$cirugias = Cirugias_x_paciente::where([["idCentro_medico","=",$centroMedico->id],["Fecha_egreso","=",$date],["idPaciente","=",$paciente->id]])->get();
   		foreach ($cirugias as $cirugia){
  			if(empty($cirugia->id))break;
  			$c=Cirugias::findOrFail($cirugia->idCirugia);
  			$medico= Medicos::findOrFail($cirugia->idMedico);
  			$newCirugias[] = array('Cirugia'=>array('Nombre' => $c->Nombre,
  													'Costos' => $c->Costos,
  				),
  				'Medico' => array(
   									'id' => $medico->id,
   									'Nombre' => $medico->Nombre,
   									'Apellidos' => $medico->Apellidos
   								), 
  			);
   			$total+=$c->Costos;
   		}
   		return $this->showList(
   			array(
   				'nombrePaciente' => $paciente->Nombre." ".$paciente->Apellidos,
   				'pago' 		     => $total,
   				'cirugias' 		 => empty($newCirugias) ? ' ' : $newCirugias,
   				'consultas'		=> empty($newConsulta) ? ' ' : $newConsulta,
   				'vacunas'		=> empty($newVacunas) ? ' ' : $newVacunas
   			));
    }
}