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

        $lastCirugias = Cirugias_x_paciente::where([
                      ["Estado", "=",Cirugias_x_paciente::EN_PROCESO],
                      ["idCentro_medico","=",$centroMedico->id]
                    ])->get();

        
        foreach ($lastCirugias as $lastCirugia) {
            $medico   = Medicos::findOrFail($lastCirugia->idMedico);
            $cama     = Camas_x_piso::findOrFail($lastCirugia->idCama);
            $paciente = Pacientes::findOrFail($lastCirugia->idPaciente);    

        }
        


    }   
}
