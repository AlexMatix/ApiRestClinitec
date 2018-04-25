<?php

namespace App\Http\Controllers\CentroMedico;

use App\Centro_medico;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CentroMedicoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Centro_medico::where("Estado", "<>", 0)->get();
        if(empty($usuarios)){
            return $this->errorResponse('Datos no encontrados', 404);
        }
        return $this->showAll($usuarios, 200);
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
        $newCentroMedico = Centro_medico::create($data); 

        return $this->showOne($newCentroMedico, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Centro_medico $centro_medico)
    {
        return $this->showOne($centro_medico, 200);
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
    public function destroy(Centro_medico $centro_medico)
    {
       
      $centro_medico->Estado = Centro_medico::NO_ACTIVO;

      if(!$centro_medico->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
    
}
