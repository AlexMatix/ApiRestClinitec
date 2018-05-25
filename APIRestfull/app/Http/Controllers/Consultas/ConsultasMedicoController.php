<?php

namespace App\Http\Controllers\Consultas;

use App\Consultas;
use App\Http\Controllers\ApiController;
use App\Medicos;
use Illuminate\Http\Request;

class ConsultasMedicoController extends ApiController
{
    
    public function ConsutasXMedico($id){

        $medico = Medicos::findOrFail($id);
    
        $consultas = Consultas::where("idMedico", "=", $medico->id)->orderBy('id', 'desc')->limit(10)->get();

                    


        return $this->showAll($consultas);
    }  
}
