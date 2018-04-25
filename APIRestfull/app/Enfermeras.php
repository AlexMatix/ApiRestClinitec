<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermeras extends Model
{
    //
    CONST ACTIVA = 1;
    CONST NO_ACTIVA = 0;

    protected $fillable = [
    	'id',
    	'Nombre',
    	'Apellidos',
    	'Sexo',
    	'Edad',
    	'Cedula',
    	'Direccion',
    	'idCentro_medico',
    	'Estado'
    ];
    public $timestamps = false;

}
