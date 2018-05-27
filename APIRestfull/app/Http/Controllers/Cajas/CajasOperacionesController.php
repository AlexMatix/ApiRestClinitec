<?php

namespace App\Http\Controllers\Cajas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Centro_medico;


class CajasOperacionesController extends ApiController
{
    //
    public function CajasCalculoTotal($date){

    	$idCentroMedico=$_GET['idCentroMedico'];
    	$centroMedico= Centro_medico::finOrFail($idCentroMedico);
   		
    	$idpaciente= $_GET['idpaciente'];
   		$paciente= Pacientes::finOrFail($idpaciente);

   		$idmedico= $_GET('idmedico');
   		$medico= Medicos::finOrFail($idmedico);
   		$cirugias = Cirugias_x_paciente::where([["idMedico","=",$medico->id],["idCentro_medico","=",$centroMedico->id],["Fecha_egreso","=",$date]])->get();
   		$consultas = Cirugias_x_paciente::where([["idMedico","=",$medico->id],["idCentro_medico","=",$centroMedico->id],["Fecha","=",$date]])->get();
   		$vacunas = Vacunas_x_paciente::where([["idMedico","=",$medico->id],["idCentro_medico","=",$centroMedico->id],["Fecha_aplicacion","=",$date]])->get();

   		print_r($cirugias);
   		print_r($consultas);
   		print_r($vacunas);
    }
}
