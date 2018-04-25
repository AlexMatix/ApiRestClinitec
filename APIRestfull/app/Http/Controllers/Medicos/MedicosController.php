<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\ApiController;
use App\Medicos;
use App\Traits\showOne;
use Illuminate\Http\Request;

class MedicosController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medicos::where("Estado", "<>", 0)->get();
        if(!empty($medicos)){
            return $this->showAll($medicos);
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
        $newMedico = Medicos::create($campos);
        //201 = respuesta de success register
        return $this->showAll($newMedico);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medico)
    {
        return $this->showOne($medico);
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
    public function destroy(Medicos $medico)
    {

      $medico->Estado = Medicos::NO_ACTIVO;

      if(!$medico->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
}
