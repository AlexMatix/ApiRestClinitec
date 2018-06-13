<?php

namespace App\Http\Controllers\Consultas;

use App\Centro_medico;
use App\Consultas;
use App\Http\Controllers\ApiController;
use App\Indicaciones_medicas;
use App\Vacunas_x_paciente;
use Illuminate\Http\Request;

class ConsultasInsertController extends ApiController
{
    
    public function insertConsulta(Request $request){   
        
        $campos  = $request->all();
        
        if(!isset($campos['consulta'])){
            $this->errorResponse("Consulta de medico no encontrado", 404);
        }
        $consulta    = $campos['consulta'];
        $newConsulta = Consultas::firstOrCreate($consulta);
        $response['consulta'] = $newConsulta;

        if(!empty($campos['recetas']['Titulo'])){
            $receta = $campos['recetas'];
            $newReceta = new Recetas;
            $newReceta->Titulo          = $receta['Titulo'];
            $newReceta->Descripcion     = $receta['Descripcion'];
            $newReceta->Medicamentos    = $receta['Medicamentos'];
            $newReceta->idConsulta      = $newConsulta->id;
            $newReceta->idCentro_medico = $newConsulta->idCentro_medico;
            if(!$newReceta->save()){
                $this->errorResponse("No se pueden registrar los datos", 500);
            }
        }
        if(!empty($campos['indicaciones']['Dieta'])){
            $indicaciones = $campos['indicaciones'];
            $newindicacion = new Indicaciones_medicas;
            $newindicacion->Dieta = $indicaciones['Dieta'];
            $newindicacion->Lista_medicamentos = $indicaciones['Lista_medicamentos'];
            $newindicacion->Esquema_soluciones = $indicaciones['Esquema_soluciones'];
            $newindicacion->Medias_generales   = $indicaciones['Medias_generales'];
            $newindicacion->Hemocomponentes    = $indicaciones['Hemocomponentes'];
            $newindicacion->idConsulta         = $newConsulta->id;
            $newindicacion->idCentro_medico    = $newConsulta->idCentro_medico;
            $newindicacion->save();
            $response['indicaciones'] = $newindicacion;
        }

        if(!empty($campos['vacunas']['idVacuna'])){
            $vacuna    = $campos['vacunas'];
            $newVacuna = new Vacunas_x_paciente;
            $newVacuna->Fecha_aplicacion = $vacuna['Fecha_aplicacion'];
            $newVacuna->idVacuna        = $vacuna['idVacuna'];
            $newVacuna->idConsulta      = $newConsulta->id;
            $newVacuna->idCentro_medico = $newConsulta->idCentro_medico;
            $newVacuna->idPaciente      = $newConsulta->idPaciente;
            $newVacuna->save();
            $response['vacuna'] = $newVacuna;
        }

        return $this->showList($response);
    }
}
 