<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslados extends Model
{
    CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;
    
    public $timestamps = false;
    protected $fillable = 
    [
    	'id',
    	'Fecha_traslado',
    	'idCama',
    	'idPaciente',
    	'idCentro_medico',
    	'Estado',
    ];
}
