<?php

namespace App\Http\Controllers\UsuariosSistema;

use App\Http\Controllers\ApiController;
use App\Suscripciones;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsuariosSistema\LoginUsuario;

class UsuariosSistemaController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('CrearSuperUsuario');

    }

    public function index()
    {
        if(isset($_GET['centro']))
            return $this->errorResponse("Centro medico no econtrado", 404);

       $usuarios = User::where([
           ["Estado", "<>", User::NO_ACTIVA],
           ["idTipo_usuario", "=", User::ADMINISTRADOR],
           ["idTipo_usuario", "=", User::FARMACIA]
       ])->get();
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
      if(!$newUser->save()){
         return $this->errorResponse('Error al guardar', 403);
      }
      return $this->showOne($newUser);      
    }

    public function show($id){
        
        $usuarios = User::findOrFail($id);
        

        return $this->showOne($usuarios);

    }

   public function update(Request $request, $id){

      $usuario = User::findOrFail($id);
   
      $usuario->Usuario = $request->has('Usuario') ? $request->Usuario : $usuario->Usuario;
      $usuario->Password = $request->has('Password') ? $request->Password : $usuario->Password;

      if(!$usuario->save()){
         return $this->errorResponse('No se pudieron actualizar los datos', 404);
      }

      return $this->showOne($usuario);
   }

    public function destroy($id){

      $usuario = User::findOrFail($id);
      $usuario->Estado = User::NO_ACTIVA;

      if(!$usuario->save()){
         return $this->errorResponse('No se pudieron eliminar los datos', 403);
      }

      return $this->succesMessaje('Eliminado con exito', 201);

    }

    public function verifyAcount($token){

        $usuario = User::where("Token_verificacion", "=", "$token")->firstOrFail();
        try{
            $usuario->Verificada = User::VERIFICADA;
            $usuario->Token_verificacion = "null";
            $usuario->save();
        }catch (QueryException $e){
            return false;
        }

    }


    public function CrearSuperUsuario(Request $request){

      $campos = $request->all();

      $newUser = new User;
      $newUser->password       = bcrypt($campos['password']);
      $newUser->email          = $campos['email'];
      $newUser->Fecha_registro = date("Y-m-d");
      $newUser->Token_verificacion = "null";
      $newUser->idCentro_medico    = 1;
      $newUser->idTipo_usuario     = User::SUPERADMIN;
      $newUser->Verificada         = User::VERIFICADA;
      
      if($newUser->save()){
        return $this->showOne($newUser);
      }
      return $this->errorResponse("No se pudo registrar", 403);
    }

    public function getInformacionUsuario($email){

        $user = User::where("email", "=","$email")->first();
        $LoginUsuario = new LoginUsuario;
        switch ($user->idTipo_usuario){
            case User::MEDICO :
                $table = "medicos";
                break;
            case User::PACIENTE :
                $table = "pacientes";
                break;
            case User::ENFERMERA :
                $table = "enfermeras";
                break;
            case User::ADMINISTRADOR :
                $username = DB::table('users')
                    ->join('suscripciones', "suscripciones.idUsuarios_sistema", "=", "users.id")
                    ->where("users.email", "=",$email)
                    ->select("suscripciones.Nombre_persona as Nombre","suscripciones.Apellidos_persona as Apellidos","suscripciones.idCentro_medico","users.id","users.email","users.idTipo_usuario")
                    ->first();
                $menu = $LoginUsuario->getMenu($user->idTipo_usuario);
                return $this->showList(array("User" => $username, "Menu" => $menu), 200);
                break;
            default :
                return $this->errorResponse("Usuario no valido", 403);
                break;
        }

        $username = DB::table('users')
            ->join($table, "$table.idUser", "=", "users.id")
            ->where("users.email", "=",$email)
            ->select("$table.id","$table.Nombre","$table.Apellidos", "$table.Sexo","$table.idCentro_medico","$table.Telefono","users.id","users.email","users.id as idUser", "users.idTipo_usuario")
            ->first();
        $menu = $LoginUsuario->getMenu($user->idTipo_usuario);
        return $this->showList(array("User" => $username, "Menu" => $menu), 200);
    }

    public static function checkPermisoUsuarioClient($email){
        $username      = User::where("email","=","$email")->firstOrFail();
        $suscripcion = DB::table('centro_medico')
                        ->join("suscripciones", "centro_medico.id", "=", "suscripciones.idCentro_medico")
                        ->where("centro_medico.id", "=",$username->idCentro_medico)
                        ->select("suscripciones.Estado")
                        ->first();
        if($username->idTipo_usuario == User::SUPERADMIN && !$username->Estado == User::NO_ACTIVA && $username->Verificada == User::VERIFICADA)
            return 1;

        if ($suscripcion->Estado == Suscripciones::ELIMINADA)
            return 2;

        if($suscripcion->Estado == Suscripciones::SUSPENDIDA)
            return 3;

        return true;
    }


    public static function checkPermisoUsuarioAdmin($email){
        $username = User::where("email","=","$email")->firstOrFail();
        if($username->idTipo_usuario == User::SUPERADMIN)
            return true;
        return false;
    }

    public static function checkPermisoUsuarioClientApp($email){
        $username = User::where("email","=","$email")->firstOrFail();
        if($username->idTipo_usuario == User::MEDICO || $username->idTipo_usuario == User::PACIENTE)
            return true;
        return false;
    }

}
