<?php

namespace App\Http\Controllers\Enfermeras;

use App\Enfermeras;
use App\Http\Controllers\ApiController;
use App\Traits\showOne;
use App\User;
use Illuminate\Http\Request;

class EnfermerasController extends ApiController
{
    
    public function __construct(){

        $this->middleware('client.credentials')->only(['index', 'show']);
    }


    public function index()
    {
        $enfermeras = Enfermeras::where("Estado", "<>", 0)->get();
        if(!empty($enfermeras)){
            return $this->showAll($enfermeras);
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

        $campos = $request->all();
        $newEnfermera = new Enfermeras;
        $newEnfermera->Nombre          =  $campos['Nombre']; 
        $newEnfermera->Apellido        =  $campos['Apellido']; 
        $newEnfermera->Sexo            =  $campos['Sexo']; 
        $newEnfermera->Edad            =  $campos['Edad']; 
        $newEnfermera->Cedula          =  $campos['Cedula']; 
        $newEnfermera->Direccion       =  $campos['Direccion']; 
        $newEnfermera->idCentro_medico =  $campos['idCentro_medico']; 

        if(!$newEnfermera->save()){
            $this->errorResponse('No se pudo registrar usuario', 505);
        }

        $date = date("Y-m-d");

        $newUsuario = new User;
        $newUsuario->password       = bcrypt($campos['password']);        
        $newUsuario->email          = $campos['email'];        
        $newUsuario->Fecha_registro = $date;        
        $newUsuario->Token_verificacion = User::generateToken();        
        $newUsuario->Verificada = User::NO_VERIFICADA;        
        $newUsuario->idEnfermera = $newEnfermera->id;        
        $newUsuario->idCentro_medico = $campos['idCentro_medico'];        
        $newUsuario->idTipo_usuario = User::MEDICO;        
        

        if(!$newUsuario->save()){
            $this->errorResponse('No se pudo registrar usuario', 505);
        }

        return $this->showOne($newUsuario);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermeras $enfermera)
    {
        return $this->showOne($enfermera);
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
        $enfermera = Enfermeras::findOrFail($id);
        $campos = $request->all();

        $enfermera->Nombre    = empty($campos['Nombre']) 
                                        ? $enfermera->Nombre
                                        : $campos['Nombre'];

        $enfermera->Apellido = empty($campos['Apellido']) 
                                        ? $enfermera->Apellido
                                        : $campos['Apellido'];

        $enfermera->Sexo = empty($campos['Sexo']) 
                                        ? $enfermera->Sexo
                                        : $campos['Sexo'];

        $enfermera->Edad = empty($campos['Edad']) 
                        ? $enfermera->Edad
                        : $campos['Edad'];

        $enfermera->Cedula = empty($campos['Cedula']) 
                        ? $enfermera->Cedula
                        : $campos['Cedula'];

        $enfermera->Direccion = empty($campos['Direccion']) 
                            ? $enfermera->Direccion
                            : $campos['Direccion'];

        $enfermera->idCentro_medico = empty($campos['idCentro_medico']) 
                            ? $enfermera->idCentro_medico
                            : $campos['idCentro_medico'];

        $enfermera->Estado     = empty($campos['Estado']) 
                            ? $enfermera->Estado
                            : $campos['Estado'];
        if ($enfermera->save()){
            return $this->showOne($enfermera, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfermeras $enfermera)
    {
        
      $enfermera->Estado = Enfermeras::NO_ACTIVA;

      if(!$enfermera->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 404);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }
}
