<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class LoginUsuario extends ApiController
{
    
    public function loginUsuario(Request $request){

    	$Campos  = $request->all();
		$Usuario =	User::where("email", "like",$Campos['email'])->get();

		foreach ($Usuario as $dato) {
			$user =(object) array(
				'email'    => empty($dato->email) ? '': $dato->email, 
				'password' => empty($dato->password) ? '': $dato->password, 
			);			
		}
		if(empty($user->email)){
			return $this->errorResponse('Datos no encontrados', 500);
		}

		print_r(bcrypt($Campos['password']) . "\n");
		
		print_r($user->password . "\n");



		if($user->password != bcrypt($Campos['password'])){
			return $this->errorResponse('Contraseña incorrecta', 500);
		}
    }
}
