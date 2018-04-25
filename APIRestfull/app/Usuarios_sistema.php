<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios_sistema extends Model
{
    //
    CONST ACTIVA          = 1;
    CONST NO_ACTIVA       = 0;
    CONST VERIFICADA      = 1;
    CONST NO_VERIFICADA   = 0;
    CONST SUPERADMIN      = 1;    
    CONST ADMINISTRADOR   = 2;
    CONST MEDICO          = 3;
    CONST ENFERMERA       = 4;
    CONST PACIENTE        = 5;
    CONST CAJERO          = 6;

    protected $fillable = 
    [
        'id',
        'Usuario',
        'Password',
        'Email',
        'Fecha_registro',
        'Token_verificacion',
        'Verificada',
        'idCentro_medico',
        'idMedico',
        'idEnfermera',
        'idTipo_usuario',
        'Estado'

    ];
    protected $table = 'usuarios_sistema';
    public $timestamps = false;

    public static function generateToken(){

        return str_random(40);
    }
}
