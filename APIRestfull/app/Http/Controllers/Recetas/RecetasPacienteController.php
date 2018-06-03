<?php

namespace App\Http\Controllers\Recetas;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Farmacias;
use Illuminate\Support\Facades\DB;

class RecetasPacienteController extends ApiController
{
    public function RecetaByPaciente(){
    	$idPaciente=$_GET['idPaciente'];
    	$recetas = DB::table('recetas')       
    						->join('consultas','recetas.idConsulta', '=', 'consultas.id')
    						->join('pacientes','consultas.idPaciente','=','pacientes.id')
    						->where('pacientes.id','=',$idPaciente)
    						->select('recetas.Titulo','recetas.Descripcion','recetas.Medicamentos','recetas.Estado','pacientes.Nombre','pacientes.Apellidos')
    	
    						->get();
    	foreach ($recetas as $receta){
    		$Medicamentos = json_decode($receta->Medicamentos);
    		foreach ($Medicamentos as $medicamento) {
    			$medicinas = Farmacias::findOrFail($medicamento);
    			$medicina[] =array(
    						'Nombre_marca' => $medicinas->Nombre_marca,
    						'Nombre_compuesto' => $medicinas->Nombre_compuesto,
    						'Precentacion' => $medicinas->Precentacion,
    						'Descripcion' => $medicinas->Descripcion,
    						'Precio' => $medicinas->Precio,
    						'Cantidad' => $medicinas->Cantidad,
    						'Codigo_barras' =>$medicinas->Codigo_barras,
    						'Lote' => $medicinas->Lote,
    						'Caducidad' => $medicinas->Caducidad,
    						'Dosis_precentacion' => $medicinas->Dosis_precentacion,
    					);

    		}
    		$result[]=array('Titulo' => $receta->Titulo,
    						'Descripcion' => $receta->Descripcion,
    						'Medicamentos' => $medicina,
    						'Estado' => $receta->Titulo,
    						'Nombre' => $receta->Nombre,
    		    			'Apellidos' => $receta->Apellidos, 

    		);
    	}
  		

    	return $this->showList($result);	
    }
}
