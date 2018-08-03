<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use  Faker\Factory as Faker;

class UsuarioSuscripcionController extends ApiController
{

    public static function generateUsuarioSuscription($idCentroMedico, $Email, $Password){
        
        $campos  = array(
            'email'              => $Email, 
            'password'           => bcrypt($Password), 
            'Fecha_registro'     => date("Y-m-d"), 
            'Token_verificacion' => User::generateToken(), 
            'Verificada'         => User::NO_VERIFICADA, 
            'idCentro_medico'    => $idCentroMedico, 
            'idTipo_usuario'     => User::ADMINISTRADOR);

        $newUsuarioForSuscritor = User::create($campos);        
        
        return $newUsuarioForSuscritor;
    }
}
