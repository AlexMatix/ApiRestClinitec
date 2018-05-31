<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UsuariosSistemaController extends ApiController
{
    
    public function __construct(){

      $this->middleware('client.credentials')->only(['index', 'show']);
    }
    public function index()
    {
       $usuarios = User::where("Estado", "<>", 0)->get();
       if(!empty($usuarios)){
            return $this->showAll($usuarios);
       }else{
            return $this->errorResponse('Datos no encontrados', 404);        
       }

    }

    public function store(Request $request)
    {
      $campos  = $request->all();
      $newUser = new User;
      $newUser->password       = bcrypt($campos['password']);
      $newUser->email          = $campos['email'];
      $newUser->Fecha_registro = date("Y-m-d");
      $newUser->Token_verificacion = User::generateToken();
      $newUser->idCentro_medico    = $campos['idCentro_medico'];

      if($request->has('idMedico')){
          $newUser->idMedico    = $campos['idMedico'];  
      }elseif ($request->has('idEnfermera')) {
          $newUser->idEnfermera = $campos['idEnfermera'];
      }elseif ($request->has('idPaciente')){
          $newUser->idPaciente  = $campos['idPaciente'];
      }else{
        return $this->errorResponse('No hay tipo de usuario', 500);
      }
      
      if($newUser->save()){
        return $this->showOne($newUser);
      }
      
      return $this->errorResponse('Error al guardar', 500);

      
      return $this->showAll($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $usuarios = User::findOrFail($id);
        

        return $this->showOne($usuarios);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id){

      $usuario = User::findOrFail($id);
   
      $usuario->Usuario = $request->has('Usuario') ? $request->Usuario : $usuario->Usuario;
      $usuario->Password = $request->has('Password') ? $request->Password : $usuario->Password;

      if(!$usuario->save()){
         return $this->errorResponse('No se pudieron actualizar los datos', 404);
      }

      return $this->showOne($usuario);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $usuario = User::findOrFail($id);
      $usuario->Estado = User::NO_ACTIVA;

      if(!$usuario->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }

    public function verifyAcount($token){

        $usuario = User::where("Token_verificacion", "=", "$token");
    }

}
