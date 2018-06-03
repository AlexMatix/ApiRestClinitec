<?php

namespace App\Http\Controllers\Suscripciones;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
	
class SuscripcionesCentroMedicoController extends ApiController
{

	public function __construct(){
        $this->middleware('client.credentials');
    }
    
   
    public function SuscripcionXCentroMedico($Tipo_suscripcion){



    	$suscripciones = DB::table('suscripciones')       
    						->join('centro_medico','suscripciones.idCentro_medico', '=', 'centro_medico.id')
    						->where('suscripciones.Tipo_suscripcion','=', $Tipo_suscripcion)
    						->select('suscripciones.Nombre_persona', 'suscripciones.Apellidos_persona', 'suscripciones.Cedula', 'suscripciones.Fecha_inscripcion', 'centro_medico.Nombre')
    						->get();
		

    	return $this->showList($suscripciones);

    }
}
