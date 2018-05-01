<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cirugias extends Model
{	
    CONST NO_ACTIVA = 0;
	CONST ACTIVA    = 1;
	

    protected $fillable = 
    [
     'id',
     'Nombre',
     'Riesgos',
     'Costos',
     'Duracion',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;
}
