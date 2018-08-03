<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;
    CONST URGENCIA =2;
    CONST INGRESADO = 3;

    CONST CASADO     = 1;
    CONST SOLTERO    = 2;
    CONST DIVORCIADO = 3;
    CONST VIUDO      = 4;

    protected $fillable =
        [
            'id',
            'Nombre',
            'Apellidos',
            'Sexo',
            'Telefono',
            'Celular',
            'Estado_civil',
            'Fecha_nacimiento',
            'Direccion',
            'Tipo_sangre',
            'Fecha_inscripcion',
            'idUser',
            'idCentro_medico',
            'Estado'
        ];



    //protected $hidden=['id','Estado'];
    public $timestamps = false;
}
