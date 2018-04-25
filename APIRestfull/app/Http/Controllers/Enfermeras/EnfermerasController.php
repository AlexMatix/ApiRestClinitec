<?php

namespace App\Http\Controllers\Enfermeras;

use App\Enfermeras;
use App\Http\Controllers\ApiController;
use App\Traits\showOne;
use Illuminate\Http\Request;

class EnfermerasController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermeras = Enfermeras::where("Estado", "<>", 0)->get();
        if(!empty($enfermeras)){
            return $this->showAll($enfermeras);
        }else{
            return $this->errorResponse('Datos no encontrados', 404);        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos    = $request->all();
        $newEnfermera = Enfermeras::create($campos);
        //201 = respuesta de success register
        return $this->showAll($newEnfermera);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermeras $enfermera)
    {
        return $this->showOne($enfermera);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfermeras $enfermera)
    {
        
      $enfermera->Estado = Enfermeras::NO_ACTIVA;

      if(!$enfermera->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
