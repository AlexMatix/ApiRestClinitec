<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro_medico extends Model
{
    CONST NO_ACTIVO = 0;
	CONST ACTIVO    = 1;
    CONST NO_CONFIG = 2;
    
   

    protected $fillable = 
    [
     'id',
     'Nombre',
     'Direccion',
     'Tipo_centro_medico',
     'Estado',
    ];

    protected $table = 'centro_medico';
    public $timestamps = false;

}
