<?php

namespace App\Http\Controllers\CentroMedico;

use App\Centro_medico;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsuariosSistema\UsuarioSuscripcionController;
use App\Suscripciones;
use App\User;
use Illuminate\Http\Request;


class CentroMedicoSuscripcionController extends ApiController
{   

    public function __construct(){
        $this->middleware('client.credentials');
    }
    

    public function newCentroMedicoSuscripcion(Request $request){

        if(!$request->has('Nombre') || !$request->has('Direccion') || !$request->has('Tipo_centro_medico') || !$request->has('email') || !$request->has('Password')){
            return $this->errorResponse('datos no encontrados', 404);
        }
        //Primero creó el Centro medico

        $datos = $request->all();

        $newCentroMedico = new Centro_medico();
        $newCentroMedico->Nombre             = $datos['Nombre'];
        $newCentroMedico->Direccion          = $datos['Direccion'];
        $newCentroMedico->Tipo_centro_medico = $datos['Tipo_centro_medico'];

        if(!$newCentroMedico->save()){
            return $this->errorResponse('No se pude registras', 403);
        }

        //se crea un usuario para la persna

        $usuario = UsuarioSuscripcionController::generateUsuarioSuscription($newCentroMedico->id ,$datos['email'], $datos['Password']);

        if(empty($usuario->email)){
            $this->rollbackCentroMedico($newCentroMedico->id);
            return $this->errorResponse('No se puede registrar', 403);
        }

        $camposSuscripcion = new Suscripciones(); 

        $camposSuscripcion->Tipo_suscripcion   = $datos['Tipo_suscripcion']; 
        $camposSuscripcion->Nombre_persona     = $datos['Nombre_persona']; 
        $camposSuscripcion->Apellidos_persona  = $datos['Apellidos_persona']; 
        $camposSuscripcion->Fecha_inscripcion  = date("Y-m-d");
        $camposSuscripcion->Cedula             = $datos['Cedula']; 
        $camposSuscripcion->idCentro_medico    = $newCentroMedico->id; 
        $camposSuscripcion->idUsuarios_sistema = $usuario->id; 

        if(!$camposSuscripcion->save()){
            $this->rollbackCentroMedico($newCentroMedico->id);
            $this->rollbackUsuarioSistema($usuario->id);
            return $this->errorResponse('No se pude registras', 403);
        }

        $this->MailSuscripcion($usuario,$camposSuscripcion);

        return $this->succesMessaje("Registro con exito", 201);


    }   

    public function rollbackCentroMedico($id){
        $centroMedico = Centro_medico::destroy($id);
    }

    public function rollbackUsuarioSistema($id){
        $centroMedico = User::destroy($id);
    }
}
