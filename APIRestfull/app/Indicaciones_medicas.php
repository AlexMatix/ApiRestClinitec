<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicaciones_medicas extends Model
{
 	CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    public $timestamps = false;

    protected $fillable = 
    [
    	'id',
    	'Dieta',
    	'Esquema_soluciones',
    	'Lista_medicamentos',
    	'Medias_generales',
    	'Hemocomponentes',
    	'idConsulta',	
    	'idCentro_medico',
    	'Estado',
    ];
}
