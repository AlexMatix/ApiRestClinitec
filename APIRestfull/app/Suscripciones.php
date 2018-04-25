<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    //
    CONST ELIMINADA  = 0;
    CONST ACTIVA 	 = 1;
    CONST SUSPENDIDA = 2;

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
