<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    //
    CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;
    CONST MALE      = 0;
    CONST FEMALE    = 1;
    public $timestamps = false;
    protected $fillable = 
    [
        'id',
        'Nombre',
        'Apellidos',
        'Especialidad',
        'Sexo',
        'Edad',
        'Cedula',
        'Direccion',
        'idCentro_medico',
        'Estado',
    ];
}
