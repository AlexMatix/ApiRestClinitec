<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro_medico extends Model
{
    CONST NO_ACTIVO = 0;
	CONST ACTIVO    = 1;
    CONST NO_CONFIG = 2;
    
    CONST CONSULTORIO     = 0;
    CONST CLINICA         = 1;
    CONST HOPITAL_BASICO  = 2;
    CONST HOPITAL_PREMIUM = 3;

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
