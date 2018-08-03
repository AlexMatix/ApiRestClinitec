<?php

namespace App\Http\Controllers\CamasXPiso;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Camas_x_piso;
use App\Centro_medico;

class CamaDisponibilidad extends ApiController
{
    public function isAvailable(){

        $idCentroMedico=$_GET['idCentroMedico'];
        $centroMedico = Centro_medico::findOrFail($idCentroMedico);

        $camas= Camas_x_piso::where([["idCentro_medico","=",$centroMedico->id],["Ocupado","=",Camas_x_piso::CAMA_LIBRE]])->get();

        return $this->showAll($camas);
    }

    public function isNotAvailable(){

        $idCentroMedico=$_GET['idCentroMedico'];
        $centroMedico = Centro_medico::findOrFail($idCentroMedico);

        $camas= Camas_x_piso::where([["idCentro_medico","=",$centroMedico->id],["Ocupado","=",Camas_x_piso::CAMA_OCUPADA]])->get();
        return $this->showAll($camas);
    }
}
