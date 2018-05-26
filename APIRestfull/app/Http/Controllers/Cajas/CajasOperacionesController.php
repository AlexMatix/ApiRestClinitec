<?php

namespace App\Http\Controllers\Cajas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Centro_medico;


class CajasOperacionesController extends ApiController
{
    //
    public function CajasCalculoTotal($idCentroMedico){

    	$centroMedico= Centro_medico::finOrFail($idCentroMedico);
   		
    	$idpaciente= $_GET['idpaciente'];
   		$paciente= Pacientes::finOrFail($idpaciente);

   		$idmedico= $_GET('idmedico');
   		$medico= Medicos::finOrFail($idmedico);

   		
    }
}
