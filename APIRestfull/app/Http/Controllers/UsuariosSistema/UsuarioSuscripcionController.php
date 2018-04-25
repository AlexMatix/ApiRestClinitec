<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\Usuarios_sistema;
use Illuminate\Http\Request;
use  Faker\Factory as Faker;

class UsuarioSuscripcionController extends ApiController
{

    public static function generateUsuarioSuscription($idCentroMedico, $Email){

    	$faker = Faker::create();

    	$date = date("Y-m-d");
        
		$campos  = array(
			'Usuario' 			 => $faker->lastName, 
			'Password' 			 => $faker->password, 
			'Email' 			 => $Email, 
			'Fecha_registro' 	 => $date, 
			'Token_verificacion' => Usuarios_sistema::generateToken(), 
			'Verificada' 		 => Usuarios_sistema::NO_VERIFICADA, 
			'idCentro_medico' 	 => $idCentroMedico, 
			'idMedico' 			 => 1, 	
			'idEnfermera' 		 => 1, 
			'idPaciente' 	     => 1, 
			'idTipo_usuario' 	 => Usuarios_sistema::SUPERADMIN);

		$newUsuarioForSuscritor = Usuarios_sistema::create($campos);        

        return $newUsuarioForSuscritor;

    }
}
