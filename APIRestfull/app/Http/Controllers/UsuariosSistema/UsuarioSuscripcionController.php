<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;
use  Faker\Factory as Faker;

class UsuarioSuscripcionController extends ApiController
{

    public static function generateUsuarioSuscription($idCentroMedico, $Email){

    	$faker = Faker::create();

    	$date = date("Y-m-d");
        
		$campos  = array(
			'user'  			 => $faker->lastName, 
			'password' 			 => $faker->password, 
			'email' 			 => $Email, 
			'Fecha_registro' 	 => $date, 
			'Token_verificacion' => User::generateToken(), 
			'Verificada' 		 => User::NO_VERIFICADA, 
			'idCentro_medico' 	 => $idCentroMedico, 
			'idMedico' 			 => 1, 	
			'idEnfermera' 		 => 1, 
			'idPaciente' 	     => 1, 
			'idTipo_usuario' 	 => User::SUPERADMIN);

		$newUsuarioForSuscritor = User::create($campos);        

        return $newUsuarioForSuscritor;

    }
}
