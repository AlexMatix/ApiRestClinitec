<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\ApiController;
use App\Pacientes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class PacientesController extends ApiController
{

  public function __construct(){

    $this->middleware('client.credentials')->only(['index', 'show']);
   }

    public function index()
    {

      if(!isset($_GET['centro'])){
            return $this->errorResponse('Centro medico no encontrado', 404);
        }

        $pacientes = DB::table('pacientes')
                        ->join('users', 'pacientes.idUser', '=', 'users.id')
                        ->where([
                            ["pacientes.Estado", "<>", 0],
                            ["pacientes.idCentro_medico","=",$_GET['centro']]
                        ])
                        ->select('pacientes.id','pacientes.idUser', 'pacientes.Nombre', 'pacientes.Apellidos', 'pacientes.Telefono', 'pacientes.Sexo','pacientes.Estado_civil',
                            'pacientes.Fecha_nacimiento','pacientes.Estado_civil','pacientes.Celular', 'pacientes.Direccion', 'pacientes.Fecha_inscripcion', 'users.email')
                        ->get();

        return $this->showList($pacientes, 200);
    }

    public function store(Request $request)
    {
     
       
        $campos = $request->all();

        if(!$request->has("Nombre") || !$request->has("Email") || !$request->has("Password"))
            return $this->errorResponse("Datos no encontrados", 404);
      
        $newUsuario = new User;
        
        $newUsuario->password       = bcrypt($campos['Password']);        
        $newUsuario->email          = $campos['Email'];        
        $newUsuario->Fecha_registro = date("Y-m-d");

        $newUsuario->Token_verificacion = User::generateToken();        
        $newUsuario->Verificada = User::NO_VERIFICADA;
        $newUsuario->idCentro_medico = $campos['idCentro_medico'];        
        $newUsuario->idTipo_usuario = User::PACIENTE;

        try{
            $newUsuario->save();
        }catch (QueryException $e){

            return $this->errorResponse("Error al guardar usuario", 403);
        }

        $newPaciente = new Pacientes;
        $newPaciente->Nombre          = !empty($campos['Nombre']) ? $campos['Nombre'] : " "; 
        $newPaciente->Apellidos       = !empty($campos['Apellidos']) ? $campos['Apellidos'] : " ";
        $newPaciente->Sexo            = !empty($campos['Sexo']) ? $campos['Sexo'] : " ";
        $newPaciente->Telefono        = !empty($campos['Telefono']) ? $campos['Telefono'] : " ";
        $newPaciente->Celular           = !empty($campos['Celular']) ? $campos['Celular'] : " ";
        $newPaciente->Estado_civil    = !empty($campos['Estado_civil']) ? $campos['Estado_civil'] : " ";
        $newPaciente->Fecha_nacimiento = !empty($campos['Fecha_nacimiento']) ? $campos['Fecha_nacimiento'] : " ";
        $newPaciente->Direccion       = !empty($campos['Direccion']) ? $campos['Direccion'] : " ";
        $newPaciente->Tipo_sangre     = !empty($campos['Tipo_sangre']) ? $campos['Tipo_sangre'] : " "; 
        $newPaciente->Fecha_inscripcion = date("Y-m-d"); 
        $newPaciente->idUser          = $newUsuario->id;
        $newPaciente->idCentro_medico = !empty($campos['idCentro_medico']) ? $campos['idCentro_medico'] : " ";


        try{
            $newPaciente->save();
        }catch (QueryException $e){
            $this->rollbackUser($newUsuario->id);
            return $this->errorResponse("Error al guardar paciente ", 403);
        }

        $this->MailSuscripcion($newUsuario,$newPaciente);
        return $this->showList(array('Paciente' => $newPaciente, 'Usuario' => $newUsuario));

    }

    public function show($id){

        $pacientes = DB::table('pacientes')
            ->join('users', 'pacientes.idUser', '=', 'users.id')
            ->where("pacientes.id","=",$id)
            ->select('pacientes.id', 'pacientes.Nombre', 'pacientes.Apellidos', 'pacientes.Telefono', 'pacientes.Sexo',
                'pacientes.Fecha_inscripcion', 'pacientes.Direccion', 'pacientes.Fecha_inscripcion', 'pacientes.Fecha_nacimiento',
                'pacientes.Tipo_sangre','pacientes.Celular','pacientes.Estado_civil', 'users.email')
            ->get();

        return $this->showList($pacientes, 200);
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
        $paciente = Pacientes::findOrFail($id);
        $campos = $request->all();

        $paciente->Nombre    = empty($campos['Nombre']) 
                                        ? $paciente->Nombre
                                        : $campos['Nombre'];

        $paciente->Apellidos = empty($campos['Apellidos']) 
                                        ? $paciente->Apellidos
                                        : $campos['Apellidos'];
        $paciente->Sexo    = empty($campos['Sexo'])
            ? $paciente->Sexo
            : $campos['Sexo'];

        $paciente->Telefono    = empty($campos['Telefono'])
            ? $paciente->Telefono
            : $campos['Telefono'];

        $paciente->Celular    = empty($campos['Celular'])
                                        ? $paciente->Celular
                                        : $campos['Celular'];


        $paciente->Estado_civil = empty($campos['Estado_civil'])
            ? $paciente->Estado_civil
            : $campos['Estado_civil'];

        $paciente->Fecha_nacimiento = empty($campos['Fecha_nacimiento'])
            ? $paciente->Fecha_nacimiento
            : $campos['Fecha_nacimiento'];


        $paciente->Direccion = empty($campos['Direccion'])
                                        ? $paciente->Direccion
                                        : $campos['Direccion'];

        $paciente->Tipo_sangre    = empty($campos['Tipo_sangre'])
                                        ? $paciente->Tipo_sangre
                                        : $campos['Tipo_sangre'];



        $paciente->Fecha_inscripcion = empty($campos['Fecha_inscripcion']) 
                                        ? $paciente->Fecha_inscripcion
                                        : $campos['Fecha_inscripcion'];


        $paciente->Estado     = empty($campos['Estado']) 
                                        ? $paciente->Estado
                                        : $campos['Estado'];
        if ($paciente->save()){
            return $this->showOne($paciente, 201);
        }

        return $this->errorResponse("Ocurrio algún error intentelo mas tarde", 403);
    }

    
    public function destroy(Pacientes $paciente)
    {
        
      $paciente->Estado = Pacientes::NO_ACTIVO;
      if(!$paciente->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 403);
      }

      return $this->succesMessaje('Eliminado con exito', 201);
    }

  public function rollbackUser($id){
        $user = User::destroy($id);
  }


}
