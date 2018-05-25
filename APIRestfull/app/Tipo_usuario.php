<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    //
    CONST ACTIVO    = 1;
    CONST NO_ACTIVO = 0;

    protected $fillable =
    [
    	'id',
    	'Tipo_usuario',
    	'Estado'
    ];
    protected $table = 'tipo_usuario';
    public $timestamps = false;
}
