<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
   
   CONST ACTIVO 	  = 1;
   CONST NO_ACTIVO    = 0;

    protected $fillable = 
    [
     'id',
     'Fecha',
     'Tipo_estudio',
     'Descripcion',
     'idPaciente',
     'idCentro_medico',
     'Estado',
    ];

    protected $hidden=['id','Estado'];
    public $timestamps = false;    
}
