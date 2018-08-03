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
        'Telefono',
        'Fecha_nacimiento',
        'Cedula',
        'Direccion',
        'idUser',
        'idCentro_medico',
        'Estado'
    ];
    public $timestamps = false;
    //protected $hidden=['id','Estado'];


}
