<?php

namespace App\Http\Controllers\Urgencias;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Urgencias;
use App\Centro_medico;

class UrgenciasCentroMedicoController extends ApiController
{
    public function UrgenciasXCentroMedico($idCentroMedico){

    	$centroMedico= Centro_medico::findOrFail($idCentroMedico);
    	$date= date("Y-m-d");
    	$urgencias=Urgencias::where([["idCentro_medico","=",$centroMedico->id],["Fecha_ingreso","=",$date]])->get();
    	return $this->showAll($urgencias,201);
    }

    public function UrgenciasXCentroMedicoAndDate($idCentroMedico){
    	$centroMedico= Centro_medico::findOrFail($idCentroMedico);
    	$date=$_GET['fecha'];

    	$urgencias=Urgencias::where([["idCentro_medico","=",$centroMedico->id],["Fecha_ingreso","=",$date]])->get();
    	return $this->showAll($urgencias,201);
    }
}
