<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\Usuarios_sistema;
use Illuminate\Http\Request;

class UsuariosSistemaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuarios = Usuarios_sistema::where("Estado", "<>", 0)->get();
       if(!empty($usuarios)){
            return $this->showAll($usuarios);
       }else{
            return $this->errorResponse('Datos no encontrados', 404);        
       }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $campos     = $request->all();
      $newUsuario = Usuarios_sistema::create($campos);
      //201 = respuesta de success register
      return $this->showAll($newUsuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $usuarios = Usuarios_sistema::findOrFail($id);
        

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

      $usuario = Usuarios_sistema::findOrFail($id);
   
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

      $usuario = Usuarios_sistema::findOrFail($id);
      $usuario->Estado = Usuarios_sistema::NO_ACTIVA;

      if(!$usuario->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }
}
