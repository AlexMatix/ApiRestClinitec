<?php

namespace App\Http\Controllers\Recetas;

use App\Http\Controllers\ApiController;
use App\Recetas;
use Illuminate\Http\Request;

class RecetasController extends ApiController
{
    public function index()
    {
        $receta = Recetas::where("Estado", "<>", 0)->get();
        
        if(empty($receta)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($receta, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $receta = Recetas::create($data); 

        return $this->showOne($receta, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $receta = Recetas::findOrFail($id);
        return $this->showOne($receta, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $receta = Recetas::findOrFail($id);
        $campos = $request->all();

        $receta->Titulo    = empty($campos['Titulo']) 
                                        ? $receta->Titulo
                                        : $campos['Titulo'];

        $receta->Descripcion = empty($campos['Descripcion']) 
                                        ? $receta->Descripcion
                                        : $campos['Descripcion'];

        $receta->Medicamentos = empty($campos['Medicamentos']) 
                                        ? $receta->Medicamentos
                                        : $campos['Medicamentos'];
        
        $receta->idConsulta    = empty($campos['idConsulta']) 
                                        ? $receta->idConsulta
                                        : $campos['idConsulta'];

        $receta->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $receta->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $receta->Estado     = empty($campos['Estado']) 
                                        ? $receta->Estado
                                        : $campos['Estado'];
        if ($receta->save()){
            return $this->showOne($receta, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
      $receta =  Recetas::findOrFail($id);

      $receta->Estado = Recetas::NO_ACTIVO;

      if(!$receta->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
