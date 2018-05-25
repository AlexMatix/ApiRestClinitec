<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
     'id',
     'Nombre',
     'Apellidos',
     'Telefono',
     'Sexo',
     'Edad',
     'Direccion',
     'Tipo_sangre',
     'Fecha_inscripcion',
     'idCentro_medico',
     'Estado'
    ];


    public $timestamps = false;
}
