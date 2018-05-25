<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    //
    CONST ELIMINADA  = 0;
    CONST ACTIVA 	 = 1;
    CONST SUSPENDIDA = 2;

    CONST CONSULTORIO     = 0;
    CONST CLINICA         = 1;
    CONST HOPITAL_BASICO  = 2;
    CONST HOPITAL_PREMIUM = 3;
    
    protected $fillable = 
    [
    	'id',
    	'Tipo_suscripcion',
    	'Nombre_persona',
    	'Apellidos_persona',
    	'Fecha_inscripcion',
        'Cedula',
        'idCentro_medico',
        'idUsuarios_sistema',
        'Estado'
    ];
    public $timestamps = false;
    
}
