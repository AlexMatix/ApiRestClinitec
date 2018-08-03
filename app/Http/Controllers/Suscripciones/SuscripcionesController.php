<?php

namespace App\Http\Controllers\Suscripciones;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsuariosSistema\UsuarioSuscripcionController;
use App\Mail\ServiceEmail;
use App\Suscripciones;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuscripcionesController extends ApiController
{

    public function index()
    {
        if(isset($_GET['tipo'])){
            $tipo = $_GET['tipo'];
            $suscripciones = Suscripciones::where(
                    [
                        ["Tipo_suscripcion", "=", "$tipo"], 
                        ["Estado", "<>", 0]
                    ]
                )->get();

        }else{
            
            $suscripciones = Suscripciones::where("Estado", "<>", 0)->get();
        }
        if(isset($_GET['delete'])){
            $suscripciones = Suscripciones::where("Estado", "=", 0)->get();
        }

        return response()->json($suscripciones, 200);
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
        
        if (!$newSuscripcion->save()){
            //$usuario = User::destroy($usuario->id);
            return $this->errorResponse("no se pudo almacenar suscripcion", 403);
        }
    
        
        return response()->json(['suscripcion' => $newSuscripcion, 'Usuaio' => $usuario], 201);
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
        return $this->showOne($suscripcion, 201);
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

        $suscripcion->Tipo_suscripcion = !isset($campos['Tipo_suscripcion']) 
                                        ? $suscripcion->Tipo_suscripcion
                                        : $campos['Tipo_suscripcion'];

        $suscripcion->Nombre_persona = !isset($campos['Nombre_persona']) 
                                        ? $suscripcion->Nombre_persona
                                        : $campos['Nombre_persona'];

        $suscripcion->Apellidos_persona = !isset($campos['Apellidos_persona']) 
                                        ? $suscripcion->Tipo_suscripcion
                                        : $campos['Apellidos_persona'];

        $suscripcion->Cedula  = !isset($campos['Cedula']) 
                                        ? $suscripcion->Cedula
                                        : $campos['Cedula'];

        $suscripcion->Estado  = !isset($campos['Estado']) 
                                        ? $suscripcion->Estado
                                        : $campos['Estado'];
        if ($suscripcion->save()){
            return $this->showOne($suscripcion, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 403);
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
            return $this->showOne($suscripcion, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 403);
    }
}
