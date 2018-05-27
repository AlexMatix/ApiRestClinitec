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

class CajasOperacionesController extends ApiController
{
    //
    public function CajasCalculoTotal($date){

    	$idCentroMedico=$_GET['idCentroMedico'];
    	$centroMedico= Centro_medico::findOrFail($idCentroMedico);
   		
    	$idpaciente= $_GET['idpaciente'];
   		$paciente= Pacientes::findOrFail($idpaciente);

   		$idmedico= $_GET['idmedico'];
   		$medico= Medicos::findOrFail($idmedico);

   		$cirugias = Cirugias_x_paciente::where([["idMedico","=",$medico->id],["idCentro_medico","=",$centroMedico->id],["Fecha_egreso","=",$date]])->get();
   		$consultas = Consultas::where([["idMedico","=",$medico->id],["idCentro_medico","=",$centroMedico->id],["Fecha","=",$date]])->get();
   		print_r($consultas);
   		$vacunas = Vacunas_x_paciente::where([["idConsulta","=",$consultas->id],["idCentro_medico","=",$centroMedico->id],["Fecha_aplicacion","=",$date]])->get();


   		print_r($cirugias);
   		print_r($consultas);
   		print_r($vacunas);
    }
}
