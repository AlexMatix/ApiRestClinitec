<?php

namespace App\Http\Controllers\Traslados;

use App\Centro_medico;
use App\Http\Controllers\Controller;
use App\Traslados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrasladosHospitalController extends Controller
{
    
    public function getLastTraslados($idCentroMedico){

        $centroMedicos = Centro_medico::findOrFail($idCentroMedico);

        $query[] = array("idCentroMedico","=",$idCentroMedico);

        if(isset($_GET['Fecha'])){
            $query[] = array("Fecha_traslado","=",$_GET['Fecha']);
        }

        if(isset($_GET['Paciente'])){
            $query[] = array("idPaciente","=",$_GET['Paciente']);
        }

       // $traslados = DB::table('traslados')
        //                ->join('idCama');

    }
}
