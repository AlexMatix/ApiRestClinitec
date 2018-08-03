<?php

namespace App\Http\Controllers\Consultas;

use App\Consultas;
use App\Http\Controllers\ApiController;
use App\Medicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasMedicoController extends ApiController
{
    
    public function ConsutasXMedico($id){

        $medico = Medicos::findOrFail($id);
    
        $consultas = Consultas::where("idMedico", "=", $medico->id)->orderBy('id', 'desc')->limit(10)->get();

        return $this->showAll($consultas);
    }

    public function ConsultasXPaciente($idPaciente){

        $consultas = Consultas::where([
            ['idPaciente','=',$idPaciente],
            ['Estado','<>',Consultas::NO_ACTIVO]
        ])
            ->select('Consulta')
            ->orderBy('id','desc')
            ->get();

        foreach ($consultas as $consulta){
            $salida[] = json_decode($consulta['Consulta']);
        }
        
    	return $this->showList($salida);
    }  
}