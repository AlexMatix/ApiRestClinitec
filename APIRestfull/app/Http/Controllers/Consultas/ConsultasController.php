<?php

namespace App\Http\Controllers\Consultas;

use App\Consultas;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

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
            $consulta = Consultas::where("Estado", "<>", 0)->get();
        }
        
        if(empty($consulta)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($consulta, 200);


    }


    public function store(Request $request)
    {
        $data = $request->all();
        $newConsulta = Consultas::create($data); 

        return $this->showOne($newConsulta, 201);
    }

    public function show(Consultas $consulta)
    {
        return $this->showOne($consulta, 200);
    }


    public function update(Request $request, $id)
    {
        $consulta = Centro_medico::findOrFail($id);
        $campos = $request->all();

        $consulta->Peso = empty($campos['Peso']) 
                                        ? $consulta->Peso
                                        : $campos['Peso'];

        $consulta->Talla = empty($campos['Talla']) 
                                        ? $consulta->Talla
                                        : $campos['Talla'];

        $consulta->Perimetro_cefalitico = empty($campos['Perimetro_cefalitico']) 
                                        ? $consulta->Perimetro_cefalitico
                                        : $campos['Perimetro_cefalitico'];
        
        $consulta->Perimetro_Torasico = empty($campos['Perimetro_Torasico']) 
                                        ? $consulta->Perimetro_Torasico
                                        : $campos['Perimetro_Torasico'];

        $consulta->Fecha = empty($campos['Fecha']) 
                                        ? $consulta->Fecha
                                        : $campos['Fecha'];

        $consulta->Costo = empty($campos['Costo']) 
                                        ? $consulta->Costo
                                        : $campos['Costo'];

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
}
