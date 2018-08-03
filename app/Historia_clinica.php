<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia_clinica extends Model
{
    CONST NO_ACTIVA = 0;
	CONST ACTIVA 	= 1;

    protected $fillable = 
    [
     'id',
     'Historia_clinica',
     'idPaciente',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;
}
