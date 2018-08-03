<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\ApiController;
use App\Medicos;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicosAppController extends ApiController
{
    //

    public function SaveInfoApp(Request $request){

        if(!$request->has('Medico'))
            return $this->errorResponse("Medico no encontrado", 404);

        $campos = $request->all();

        $medico = Medicos::findOrFail($campos['Medico']);
        unset($campos['Medico']);

        $medico->InfoApp = json_encode($campos);
        try{
            $medico->save();
        }catch (QueryException $e){
            return $this->errorResponse("No se pudo actualizar", 409);
        }
        return $this->succesMessaje("Registro con exito",201);

    }

    public function GetInfoApp($idMedico){

        $medico = Medicos::findOrfail($idMedico);

        return $this->showList(json_decode($medico->InfoApp),200);
    }
}
