<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cirugias_x_paciente extends Model
{
   
    CONST ACTIVO 	= 1;
    CONST NO_ACTIVO = 0;
    
    public $timestamps = false;
    protected $fillable = 
    [
    	'id',
    	'Fecha_ingreso',
    	'Fecha_egreso',
    	'idCama',
    	'idPaciente',
    	'idCirugia',
    	'idMedico',
    	'idCentro_medico',
    	'Estado',
    ];
}
