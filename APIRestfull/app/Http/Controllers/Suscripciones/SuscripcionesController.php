<?php

namespace App\Http\Controllers\Suscripciones;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsuariosSistema\UsuarioSuscripcionController;
use App\Suscripciones;
use Illuminate\Http\Request;

class SuscripcionesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscripciones = Suscripciones::all();
        return response()->json(['data' => $suscripciones], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        if(empty($campos) || empty($campos['idCentro_medico']) || empty($campos['email'])){
            return response()->json(['data' => ' '],404); 
        }
        $usuario = UsuarioSuscripcionController::generateUsuarioSuscription($campos['idCentro_medico'],$campos['email']);
        

        $newSuscripcion = new Suscripciones();

        $newSuscripcion->Tipo_suscripcion   = $campos['Tipo_suscripcion'];
        $newSuscripcion->Nombre_persona     = $campos['Nombre_persona'];
        $newSuscripcion->Apellidos_persona  = $campos['Apellidos_persona'];
        $newSuscripcion->Fecha_inscripcion  = $campos['Fecha_inscripcion'];
        $newSuscripcion->Cedula             = $campos['Cedula'];
        $newSuscripcion->idCentro_medico    = $campos['idCentro_medico'];
        $newSuscripcion->idUsuarios_sistema = $usuario->id;
        $newSuscripcion->save();
  
        return response()->json(['data' => $newSuscripcion, 'Usuaio' => $usuario], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
