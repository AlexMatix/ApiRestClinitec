<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginSuperUsuario extends Controller
{
    use ApiResponse;
   
    public function loginSuperUsuario(Request $request){

      if(!$request->has('email') || !$request->has('password')){
        return $this->errorResponse("Datos no encontrados", 404);
      }

      $campos = $request->all();

      $usuario = User::where("email", "=", $campos["email"])->first();
      
      if(empty($usuario->email)){
        return $this->errorResponse("Datos no encontrados", 404);
      }

      if(!Hash::check($campos["password"], $usuario->password)){
        return $this->errorResponse("Pasword invalido", 404);
      } 

      if($usuario->idTipo_usuario != 1){
        return $this->errorResponse("Usuario sin permisos", 404);
      }
      return $this->showOne($usuario, 201);
    }
}
