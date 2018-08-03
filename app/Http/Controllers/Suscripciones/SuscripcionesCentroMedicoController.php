<?php

namespace App\Http\Controllers\Suscripciones;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
	
class SuscripcionesCentroMedicoController extends ApiController
{

    public function SuscripcionXCentroMedico($Tipo_suscripcion){

        $tipo = isset($_GET["delete"]) ? "=": "<>";

    	$suscripciones = DB::table('suscripciones')       
    						->join('centro_medico','suscripciones.idCentro_medico', '=', 'centro_medico.id')
    						->where([
                                ['suscripciones.Tipo_suscripcion','=', $Tipo_suscripcion],
                                ['suscripciones.Estado', $tipo, 0]
                            ])
    						->select('suscripciones.Nombre_persona', 'suscripciones.Apellidos_persona', 'suscripciones.Cedula', 'suscripciones.Fecha_inscripcion', 'centro_medico.Nombre', 'centro_medico.Direccion','centro_medico.Tipo_centro_medico', 'centro_medico.Estado')
    						->get();
		

    	return $this->showList($suscripciones);

    }
}
