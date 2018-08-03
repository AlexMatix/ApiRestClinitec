<?php

namespace App\Http\Controllers\Planes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model;

class PlanController extends ApiController
{
    public function __construct(){
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    public function index(){
        $planes = PlanController::getAll();
        if(!$this->isValidData($planes)){
            return $this->errorResponse("No hay data",404);
        }else{
            return $this->showList($planes);
        }
    }

    public static function getAll(){
        return DB::table('planes')->get();
    }

    public function show($id){
        $plan = PlanController::getOne($id);
        if(empty($plan))
            return $this->errorResponse("Id incorrecto",403);
        return $this->showList($plan);
    }

    public static function getOne($id){
        return DB::table('planes')->where('id',$id)->first();
    }

    public function store(Request $request){
        $plan = $request->all();
        PlanController::crearPlan($plan);
        return $this->succesMessaje("Plan creado",200);
    }

    public static function crearPlan($plan){
        if(!isset($plan['Nombre']))
            return $this->errorResponse("Faltan Campos por llenar",403);
        if(!isset($plan['Precio']))
            return $this->errorResponse("Faltan Campos por llenar",403);
        if(!isset($plan['Tipo']))
            return $this->errorResponse("Faltan Campos por llenar",403);
        try{
            DB::table('planes')->insert($plan);
        }catch(QueryException $e){
            return $this->errorResponse("Error al crear plan",403);
        }
    }

    public static function actualizar($plan){

        $plan = (array) $plan;
        $campos = DB::table('planes')->where('id',$plan['id'])->first();

        $campos->Nombre = empty($plan['Nombre']) ? $campos->Nombre : $plan['Nombre'];
        $campos->Precio = empty($plan['Precio']) ? $campos->Precio : $plan['Precio'];
        $campos->Tipo = empty($plan['Tipo']) ? $campos->Tipo : $plan['Tipo'];

        try{
            DB::table('planes')->where('id',$plan['id'])->update($plan);
        }catch(QueryException $e){
            return $this->errorResponse("Error al actualizar plan",403);
        }
    }

    public function update(Request $request,$id){
        $plan = $request->all();
        if($id != $plan['id'])
            return $this->errorResponse("El id no es el mismo",403);
        PlanController::actualizar($plan,$id);
        return $this->succesMessaje("Exito",200);
    }

    public static function deletePlan($id){
        try{
            $plan = DB::table('planes')->where('id', '=', $id)->delete();
        }catch(QueryException $e)
        {
            return $this->errorResponse("Error al eliminar",500);
        }
    }

    public function delete(){

    }
}
