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
        if(isset($_GET['tipo'])){
            $tipo = $_GET['tipo'];
            $suscripciones = Suscripciones::where([["Tipo_suscripcion", "=", "$tipo"], ["Estado", "<>", 0]])->get();
        }else{
            $suscripciones = Suscripciones::where("Estado", "<>", 0)->get();
        }
        return response()->json(['data' => $suscripciones], 200);
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
        $newSuscripcion->Fecha_inscripcion  = !empty($campos['Fecha_inscripcion']) 
                                            ? $campos['Fecha_inscripcion']
                                            : date("Y-m-d");
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
        $suscripcion = Suscripciones::findOrFail($id);
        return showOne($suscripcion, 201);
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
        $suscripcion = Suscripciones::findOrFail($id);
        $campos = $request->all();

        $suscripcion->Tipo_suscripcion = empty($campos['Tipo_suscripcion']) 
                                        ? $suscripcion->Tipo_suscripcion
                                        : $campos['Tipo_suscripcion'];

        $suscripcion->Nombre_persona = empty($campos['Nombre_persona']) 
                                        ? $suscripcion->Nombre_persona
                                        : $campos['Nombre_persona'];

        $suscripcion->Apellidos_persona = empty($campos['Apellidos_persona']) 
                                        ? $suscripcion->Tipo_suscripcion
                                        : $campos['Apellidos_persona'];

        $suscripcion->Cedula  = empty($campos['Cedula']) 
                                        ? $suscripcion->Cedula
                                        : $campos['Cedula'];

        $suscripcion->Estado  = empty($campos['Estado']) 
                                        ? $suscripcion->Estado
                                        : $campos['Estado'];
        if ($suscripcion->save()){
            return showOne($suscripcion, 201);
        }

        return errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $suscripcion = Suscripciones::findOrFail($id);
        $suscripcion->Estado = 0;

        if ($suscripcion->save()){
            return showOne($suscripcion, 201);
        }

        return errorResponse("Ocurrio algún error intentelo mas tarde", 500);

    }
}
