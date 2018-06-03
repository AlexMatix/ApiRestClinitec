<?php

namespace App\Http\Controllers\Medicos;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MedicosCentroMedicoController extends ApiController
{
    
    public function insertMedicosUser(Request $request){

    	if($request->has('idCentro_medico') && $request->has('password') && $request->has('email'))
    		$this->errorResponse("Data no encontrada", 500);

		$campos = $request->all();

		$newUser = new     	
    }
}
