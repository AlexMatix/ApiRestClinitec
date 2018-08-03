<?php

namespace App\Http\Controllers\Consultas;

use App\Consultas;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Recetas;

class ConsultasController extends ApiController
{
    
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {   
        if(isset($_GET['medico']) && isset($_GET['centro'])){
            $medico = $_GET['medico']; $centro = $_GET['centro'];
            $consulta = Consultas::where([["idCentro_medico", "=", "$centro"],["idMedico", "=", "$medico"],["Estado", "<>", 0]])->get();
        }else{
            $consulta = Consultas::where([["idMedico", "=", "$medico"],["Estado", "<>", 0]])->get();
        }
        
        if(empty($consulta)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($consulta, 200);


    }


    public function store(Request $request){

        $datos = $request->all();
        if(!isset($datos['consulta']))
            return $this->errorResponse("Datos no encontrados",404);

        $consulta = (object) $datos['consulta'];
        $receta   = (object) $datos['receta'];
        $newConsulta = new Consultas;
        $newConsulta->Consulta = json_encode($datos);
        $newConsulta->idMedico = $consulta->idMedico;
        $newConsulta->idPaciente = $consulta->idPaciente;
        $newConsulta->idCentro_medico = $consulta->idCentro_medico;
        $newConsulta->Estado = Consultas::ACTIVO;
        try{
            $newConsulta->save();
        }catch (QueryException $e){
            return $this->errorResponse("Error al almacenar consulta :: --> [$e]", 409);
        }

        if (empty($receta->Titulo) || empty($receta->Medicamentos)){
            return $this->succesMessaje("Registrado correctamente", 201);
        }

        $newReceta = new Recetas;

        $newReceta->Titulo       = $receta->Titulo;
        $newReceta->Medicamentos = json_encode($receta->Medicamentos);
        $newReceta->idMedico     = $consulta->idMedico;
        $newReceta->idPaciente   = $consulta->idPaciente;
        $newReceta->idConsulta   = $newConsulta->id;
        $newReceta->idCentro_medico = $consulta->idCentro_medico;
        $newReceta->Estado = Recetas::ACTIVO;
        try{
            $newReceta->save();
        }catch (QueryException $e){
            $this->rollbackConsulta($newConsulta->id);
            return $this->errorResponse("Error al almacenar receta --> [$e]" ."", 409);
        }

        return $this->succesMessaje("Registrado correctamente", 201);
    }

    public function show(Consultas $consulta)
    {
        return $this->showList(json_decode($consulta->Consulta), 200);
    }


    public function update(Request $request, $id)
    {
        $consulta = Centro_medico::findOrFail($id);
        $campos = $request->all();

        $consulta->Consulta = empty($campos['Consulta'])
                                        ? $consulta->Consulta
                                        : $campos['Consulta'];

        $consulta->idMedico = empty($campos['idMedico']) 
                                        ? $consulta->idMedico
                                        : $campos['idMedico'];

        $consulta->idPaciente = empty($campos['idPaciente']) 
                                        ? $consulta->idPaciente
                                        : $campos['idPaciente'];

        $consulta->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $consulta->idCentro_medico
                                        : $campos['idCentro_medico'];

        $consulta->Estado  = empty($campos['Estado']) 
                                        ? $consulta->Estado
                                        : $campos['Estado'];
        if ($consulta->save()){
            return $this->showOne($consulta, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    public function destroy(Consultas $consulta)
    {
      $consulta->Estado = Consultas::NO_ACTIVO;

      if(!$consulta->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }

    public function rollbackConsulta($id){
        return Consultas::destroy($id);
    }
}
