<?php

namespace App\Http\Controllers\Medicos;
use Illuminate\Database\QueryException;
use App\Http\Controllers\ApiController;
use App\Medicos;
use App\User;
use Illuminate\Http\Request;

class MedicosController extends ApiController
{


    public function __construct(){
        parent::__construct();
    }


    public function index()
    {

        if(isset($_GET['centro'])){
            $centro_medico = $_GET['centro'];
            $medicos = Medicos::where([["Estado", "<>", 0],["idCentro_medico", "=", "$centro_medico"]])->get();
        }


        if(!empty($medicos)){
            return $this->showAll($medicos);
        }else{
            return $this->errorResponse('Datos no encontrados', 404);        
        }
    }


    public function store(Request $request)
    {

        if(!$request->has("Nombre") || !$request->has("Email") || !$request->has("Password"))
            return $this->errorResponse("Datos no encontrados", 404);

        $campos = $request->all();
        $newUsuario = new User;
        
        $newUsuario->password       = bcrypt($campos['Password']);
        $newUsuario->email          = $campos['Email'];
        $newUsuario->Fecha_registro = date("Y-m-d");

        $newUsuario->Token_verificacion = User::generateToken();        
        $newUsuario->Verificada = User::NO_VERIFICADA;
        $newUsuario->idCentro_medico = $campos['idCentro_medico'];
        $newUsuario->idTipo_usuario = User::MEDICO;

        try{
            $newUsuario->save();
        }catch (QueryException $e){
            return $this->errorResponse("Error al guardar usuario", 403);
        }

        $newMedico = new Medicos;
        $newMedico->Nombre          = !empty($campos['Nombre']) ? $campos['Nombre'] : " ";
        $newMedico->Apellidos       = !empty($campos['Apellidos']) ? $campos['Apellidos'] : " "; 
        $newMedico->Especialidad    = !empty($campos['Especialidad']) ? $campos['Especialidad'] : " "; 
        $newMedico->Sexo            = !empty($campos['Sexo']) ? $campos['Sexo'] : " "; 
        $newMedico->Telefono        = !empty($campos['Telefono']) ? $campos['Telefono'] : " "; 
        $newMedico->Fecha_nacimiento = !empty($campos['Fecha_nacimiento']) ? $campos['Fecha_nacimiento'] : " ";
        $newMedico->Cedula          = !empty($campos['Cedula']) ? $campos['Cedula'] : " ";
        $newMedico->Direccion       = !empty($campos['Direccion']) ? $campos['Direccion'] : " ";
        $newMedico->idUser          = $newUsuario->id;
        $newMedico->idCentro_medico = !empty($campos['idCentro_medico']) ? $campos['idCentro_medico'] : " ";

        try{
            $newMedico->save();
        }catch (QueryException $e){
            $this->rollbackUser($newUsuario->id);
            return $this->errorResponse("Error al guardar Medico", 403);
        }

        $this->MailSuscripcion($newUsuario,$newMedico);
        return $this->showList(array('Medico' => $newMedico, 'Usuario' => $newUsuario));


    }



    
    public function show(Medicos $medico)
    {
        return $this->showOne($medico);
    }


    public function update(Request $request, $id)
    {
        $medico = Medicos::findOrFail($id);
        $campos = $request->all();

        $medico->Nombre    = empty($campos['Nombre']) 
                                        ? $medico->Nombre
                                        : $campos['Nombre'];

        $medico->Apellidos = empty($campos['Apellidos']) 
                                        ? $medico->Apellidos
                                        : $campos['Apellidos'];

        $medico->Especialidad = empty($campos['Especialidad']) 
                                        ? $medico->Especialidad
                                        : $campos['Especialidad'];

        $medico->Sexo      = empty($campos['Sexo']) 
                                        ? $medico->Sexo
                                        : $campos['Sexo'];

        $medico->Telefono  = empty($campos['Telefono']) 
                                        ? $medico->Telefono
                                        : $campos['Telefono'];

        $medico->Edad    = empty($campos['Edad']) 
                                        ? $medico->Edad
                                        : $campos['Edad'];

        $medico->Cedula = empty($campos['Cedula']) 
                                        ? $medico->Cedula
                                        : $campos['Cedula'];

        $medico->Direccion = empty($campos['Direccion']) 
                                        ? $medico->Direccion
                                        : $campos['Direccion'];
        
        $medico->idCentro_medico = empty($campos['idCentro_medico']) 
                                        ? $medico->idCentro_medico
                                        : $campos['idCentro_medico'];

        $medico->Estado     = empty($campos['Estado']) 
                                        ? $medico->Estado
                                        : $campos['Estado'];
        if ($medico->save()){
            return $this->showOne($medico, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicos $medico)
    {

      $medico->Estado = Medicos::NO_ACTIVO;

      if(!$medico->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 403);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }

    public function rollbackUser($id){
        return User::destroy($id);
    }



}
