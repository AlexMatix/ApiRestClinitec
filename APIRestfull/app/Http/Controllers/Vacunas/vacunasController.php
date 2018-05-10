<?php

namespace App\Http\Controllers\Vacunas;

use App\Http\Controllers\ApiController;
use App\Vacunas;
use Illuminate\Http\Request;

class vacunasController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacuna = Vacunas::where("Estado", "<>", 0)->get();
        
        if(empty($vacuna)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($vacuna, 200);
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
        $vacuna = Vacunas::create($data); 

        return $this->showOne($vacuna, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $vacuna = Vacunas::findOrFail($id);
        return $this->showOne($vacuna, 200);
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
        
        $vacuna = Vacunas::findOrFail($id);
        $campos = $request->all();

        $vacuna->Nombre    = empty($campos['Nombre']) 
                                        ? $vacuna->Nombre
                                        : $campos['Nombre'];

        $vacuna->Edad_aplicar = empty($campos['Edad_aplicar']) 
                                        ? $vacuna->Edad_aplicar
                                        : $campos['Edad_aplicar'];

        $vacuna->Costo = empty($campos['Costo']) 
                                        ? $vacuna->Costo
                                        : $campos['Costo'];

        $vacuna->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $vacuna->idCentro_medico
                                        : $campos['idCentro_medico'];
                                        
        $vacuna->Estado     = empty($campos['Estado']) 
                                        ? $vacuna->Estado
                                        : $campos['Estado'];
        if ($vacuna->save()){
            return $this->showOne($vacuna, 201);
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
        
      $vacuna =  Vacunas::findOrFail($id);

      $vacuna->Estado = Vacunas::NO_ACTIVO;

      if(!$vacuna->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
