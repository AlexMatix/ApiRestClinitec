<?php

namespace App\Http\Controllers\Consultas;

use App\Centro_medico;
use App\Consultas;
use App\Estudios;
use App\Http\Controllers\ApiController;
use App\Indicaciones_medicas;
use App\Notas;
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

        if(!empty($campos['recetas'])){
            $receta = $campos['recetas'];
            $newReceta = new Recetas;
            $newReceta->Titulo          = empty($receta['Titulo']) ? " " : $receta['Titulo'];
            $newReceta->Descripcion     = empty($receta['Descripcion']) ? " " :$receta['Descripcion'];
            $newReceta->Medicamentos    = empty($receta['Medicamentos']) ? " " : $receta['Medicamentos'];
            $newReceta->idConsulta      = $newConsulta->id;
            $newReceta->idCentro_medico = $newConsulta->idCentro_medico;
            if(!$newReceta->save()){
                $this->errorResponse("No se pueden registrar los datos", 500);
            }
        }
        if(!empty($campos['indicaciones'])){
            $indicaciones = $campos['indicaciones'];
            $newindicacion = new Indicaciones_medicas;
            $newindicacion->Dieta = $indicaciones['Dieta'];
            $newindicacion->Lista_medicamentos = empty($indicaciones['Lista_medicamentos']) ? " " :$indicaciones['Lista_medicamentos'];
            $newindicacion->Esquema_soluciones = empty($indicaciones['Esquema_soluciones']) ? " " :$indicaciones['Esquema_soluciones'];
            $newindicacion->Medias_generales   = empty($indicaciones['Medias_generales']) ? " " :$indicaciones['Medias_generales'];
            $newindicacion->Hemocomponentes    = empty($indicaciones['Hemocomponentes']) ? " " :$indicaciones['Hemocomponentes'];
            $newindicacion->idConsulta         = $newConsulta->id;
            $newindicacion->idCentro_medico    = $newConsulta->idCentro_medico;
            $newindicacion->save();
            $response['indicaciones'] = $newindicacion;
        }

        if(!empty($campos['vacunas'])){
            $vacuna    = $campos['vacunas'];
            $newVacuna = new Vacunas_x_paciente;
            $newVacuna->Fecha_aplicacion = empty($vacuna['Fecha_aplicacion']) ? " " :$vacuna['Fecha_aplicacion'];
            $newVacuna->idVacuna         = empty($vacuna['idVacuna']) ? " " :$vacuna['idVacuna'];
            $newVacuna->idConsulta       = $newConsulta->id;
            $newVacuna->idCentro_medico  = $newConsulta->idCentro_medico;
            $newVacuna->idPaciente       = $newConsulta->idPaciente;
            $newVacuna->save();
            $response['vacuna'] = $newVacuna;
        }
        
        if(!empty($campos['nota'])){
            $nota    = $campos['nota'];
            $newNota = new Notas;
            $newNota->Tipo_nota   = empty($nota["Tipo_nota"]) ? " " : $nota["Tipo_nota"]; 
            $newNota->Diagnostico = empty($nota["Diagnostico"]) ? " " : $nota["Diagnostico"]; 
            $newNota->Peso        = empty($nota["Peso"]) ? 0 : $nota["Peso"];  
            $newNota->Talla       = empty($nota["Talla"]) ? 0 : $nota["Talla"];  
            $newNota->IMC         = empty($nota["IMC"]) ? " " : $nota["IMC"];
            $newNota->SC         = empty($nota["SC"]) ? " " : $nota["SC"];
            $newNota->FC          = empty($nota["FC"]) ? " " : $nota["FC"];  
            $newNota->TR          = empty($nota["TR"]) ? " " : $nota["TR"];  
            $newNota->SVT         = empty($nota["SVT"]) ? 0 : $nota["SVT"];  
            $newNota->Temperatura = empty($nota["Temperatura"]) ? " " : $nota["Temperatura"];  
            $newNota->TA          = empty($nota["TA"]) ? " " : $nota["TA"];  
            $newNota->S02         = empty($nota["SO2"]) ? " " : $nota["SO2"];  
            $newNota->Nota        = empty($nota["Nota"]) ? " " : $nota["Nota"];  
            $newNota->Pronostico  = empty($nota["Pronostico"]) ? " " : $nota["Pronostico"];
            $newNota->idPaciente  = $newConsulta->idPaciente;
            $newNota->idMedico    = $newConsulta->idMedico;
            $newNota->idCentro_medico = $newConsulta->idCentro_medico;
            $newNota->save();
            $response['nota'] = $newNota;
            
        }
        if(!empty($campos['estudios'])){
            $estudios    = $campos['estudios'];
            $newEstudios = new Estudios;

            $newEstudios->Fecha        = empty($estudios["Fecha"]) ? " " : $estudios["Fecha"]; 
            $newEstudios->Tipo_estudio = empty($estudios["Tipo_estudio"]) ? " " : $estudios["Tipo_estudio"]; 
            $newEstudios->Descripcion  = empty($estudios["Descripcion"]) ? " " : $estudios["Descripcion"];
            $newEstudios->idPaciente   = $newConsulta->idPaciente;
            $newEstudios->idCentro_medico = $newConsulta->idCentro_medico;
            $newEstudios->save();
            $response['estudios'] = $newEstudios;
        }

        return $this->showList($response);
    }
}
 