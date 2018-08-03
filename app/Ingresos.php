<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
 	CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;
    
    public $timestamps = false;
    protected $fillable = 
    [
    	'id',
    	'Fecha_ingreso',
    	'Fecha_egreso',
    	'idCama',
    	'idPaciente',
    	'idCentro_medico',
		'Estado',
		'medicamento',
		'indicaciones',
    ];
}
