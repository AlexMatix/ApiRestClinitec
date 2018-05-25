<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
 	
 	CONST ACTIVO = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable = 
    [
     'id',
     'Nombre',
     'Direccion',
     'Descricion',
     'idCentro_medico',
     'Estado',
    ];


    public $timestamps = false;    
}
