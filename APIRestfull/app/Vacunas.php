<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunas extends Model
{
 	
 	CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
     'id',
     'Nombre',
     'Edad_aplicar',
     'Costo',
     'idCentro_medico',
     'Estado'
    ];


    public $timestamps = false;
}
