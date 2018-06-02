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
    	$consultas = DB::table('consultas')       
    						->join('pacientes','consultas.idPaciente', '=', 'pacientes.id')
    						->join('medicos','consultas.idMedico',"=","medicos.id")
    						->select('consultas.Peso','consultas.Talla','consultas.Perimetro_cefalitico','consultas.Perimetro_Torasico','consultas.Fecha','consultas.Costo','consultas.Estado','pacientes.nombre as nombre_paciente','pacientes.nombre as nombre_paciente','pacientes.Apellidos as apellido_paciente','medicos.nombre as nombre_medico','medicos.Apellidos as apellido_medico')
    						->get();

    	return $this->showList($consultas);
    }  
}