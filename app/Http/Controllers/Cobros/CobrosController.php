<?php

namespace App\Http\Controllers\Cobros;

use Conekta\Plan;
use Conekta\Conekta;
require_once("/var/www/html/ApiClinitec/conekta-php-master/lib/Conekta.php");
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Planes\PlanController;
use Conekta\Handler;

class CobrosController extends Controller{

    use ApiResponse;

    protected $Privatekey = "key_N91HaPh7huGHUEGCY8sNTw";
    protected $PublicKey  = "key_BahEESZgjd9cUKGmqiL5PcQ";

    public function __construct()
    {
        Conekta::setApiKey($this->Privatekey);
        Conekta::setApiVersion("2.0.0");
        Conekta::setLocale('es');

    }

    public function newPlan(Request $request){

        if(!$request->has('Key') || !$request->has('NombrePlan') || !$request->has('Monto'))
            return $this->errorResponse("Datos no encontrados", 404);

        $request = $request->all();
        if($request['Key'] != $this->PublicKey)
            return $this->errorResponse("Llave invalida", 404);

        try{
            Plan::create(CobrosController::convertPlanConekta($request));
            $plan = array(
                'Nombre' => strtolower($request['NombrePlan']),
                'Precio' => $request['Monto'],
                'Tipo' => "month",
            );
            PlanController::crearPlan($plan);

        }catch (Handler $error){

            return $this->errorResponse(array(
                'mensaje' => $error->getMessage(),
                'line'    => $error->getLine(),
                'trace'   => $error->getTraceAsString()
            ), $error->getCode());
        }
        return $this->succesMessaje("Plan creado con exito", 200);
    }

    /* ===================   */


    public function updatePlan(Request $request, $id){
        $update = $request->all();
        if($id != $update['id'])
            return $this->errorResponse("El id no es el mismo",500);

        $plan = Plan::find($id);

        try{
            $plan->update($update);
            $Ownplan = PlanController::getOne($id);

            $Ownplan->Nombre = empty($update['Nombre']) ? $update['Nombre'] :$Ownplan->Nombre; 
            $Ownplan->Precio = empty($update['Precio']) ? $update['Precio'] :$Ownplan->Precio;
            $Ownplan->Tipo = empty($update['Tipo'  ]) ? $update['Tipo'] :$Ownplan->Tipo;
            $Ownplan->save();
        }catch (Handler $error){
            return $this->errorResponse("Ocurrio un problema al actualizar",500);
        }
        return $this->succesMessaje("Exito");
    }

    public function getAllPlanes(){
        $planes = Plan::all();
        foreach ($planes as $plan) {
            $Ownplanes[] = CobrosController::convertPlan($plan);
        }

        return $this->showList($Ownplanes);
    }

    public function getOnePlan($id){
        $plan = strtoupper($id);
        $plan = Plan::find($plan);

        $plan = CobrosController::convertPlan($plan);
        return $this->showList($plan);
    }

    public function deletePlan($id){
        try{
        $plan = Plan::find("id");
        $plan->delete();
        PlanController::deletePlan($id);
        }catch(Handler $error){
            return $this->errorResponse("Error al eliminar",500);
        }
        return $this->succesMessaje("Exito");
    }


    public function newSuscripcion(){

    }


    public static function convertPlan($plan){
        $arr = array(
            "NombrePlan" => $plan->id ,
            "Monto" => $plan->amount,
            "Suscripcion" => "sas",
            "Key" => "",
        );
        return $arr;
    }


    public static function convertPlanConekta($plan){
        $result = array(
            'id' => strtoupper($plan['NombrePlan']),
            'name' => strtolower($plan['NombrePlan']),
            'amount' => $plan['Monto'],
            'currency' => "MXN",
            'interval' => "month",
            'frequency' => empty($plan['frecuencia'] ? 1 : $plan['frecuencia'] ),
            'trial_period_days' => 15,
            'expiry_count' => 12,
        );
        return $result;
    }

    
}

