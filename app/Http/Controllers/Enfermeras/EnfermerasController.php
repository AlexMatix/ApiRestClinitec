<?php

namespace App\Http\Controllers\Enfermeras;

use App\Enfermeras;
use Illuminate\Database\QueryException;
use App\Http\Controllers\ApiController;
use App\Traits\showOne;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnfermerasController extends ApiController
{

    public function index()
    {

        if(!isset($_GET['centro'])){
            return $this->errorResponse('Centro medico no encontrado', 404);
        }

        $enfermeras = DB::table('enfermeras')
            ->join('users', 'enfermeras.idUser', '=', 'users.id')
            ->where([
                ["enfermeras.Estado", "<>", 0],
                ["enfermeras.idCentro_medico","=",$_GET['centro']]
            ])
            ->select('enfermeras.id','enfermeras.idUser', 'enfermeras.Nombre', 'enfermeras.Apellidos', 'enfermeras.Telefono', 'enfermeras.Sexo'
                 ,'users.email')
            ->get();

        return $this->showList($enfermeras, 200);
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

        if(!$request->has("Nombre") || !$request->has("Email") || !$request->has("Password"))
            return $this->errorResponse("Datos no encontrados", 404);
      
        $newUsuario = new User;
        
        $newUsuario->password       = bcrypt($campos['Password']);        
        $newUsuario->email          = $campos['Email'];        
        $newUsuario->Fecha_registro = date("Y-m-d");

        $newUsuario->Token_verificacion = User::generateToken();        
        $newUsuario->Verificada = User::NO_VERIFICADA;
        $newUsuario->idCentro_medico = $campos['idCentro_medico'];        
        $newUsuario->idTipo_usuario = User::ENFERMERA;        
        

        try{
            $newUsuario->save();
        }catch (QueryException $e){
            return $this->errorResponse("Error al guardar usuario", 403);
        }
        
        $newEnfermera = new Enfermeras;
        $newEnfermera->Nombre          = !empty($campos['Nombre']) ? $campos['Nombre'] : " "; 
        $newEnfermera->Apellidos       = !empty($campos['Apellidos']) ? $campos['Apellidos'] : " ";
        $newEnfermera->Sexo            = !empty($campos['Sexo']) ? $campos['Sexo'] : " ";
        $newEnfermera->Telefono        = !empty($campos['Telefono']) ? $campos['Telefono'] : " ";
        $newEnfermera->Fecha_nacimiento = !empty($campos['Fecha_nacimiento']) ? $campos['Fecha_nacimiento'] : " ";
        $newEnfermera->Cedula          = !empty($campos['Cedula']) ? $campos['Cedula'] : " "; 
        $newEnfermera->Direccion       = !empty($campos['Direccion']) ? $campos['Direccion'] : " "; 
        $newEnfermera->idUser          = $newUsuario->id;
        $newEnfermera->idCentro_medico = !empty($campos['idCentro_medico']) ? $campos['idCentro_medico'] : " "; 

        try{
            $newEnfermera->save();
        }catch (QueryException $e){
            $this->rollbackUser($newUsuario->id);
            return $this->errorResponse("Error al guardar Enfermera", 403);
        }


        $this->MailSuscripcion($newUsuario,$newEnfermera);
        return $this->showList(array('Enfermera' => $newEnfermera, 'Usuario' => $newUsuario));

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

    public function rollbackUser($id){
        $user = User::destroy($id);
    }
}
