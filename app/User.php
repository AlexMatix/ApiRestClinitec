<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Model
{

    use HasApiTokens, Notifiable, Authenticatable, Authorizable;
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
    CONST FARMACIA        = 7;

    protected $fillable = 
    [
        'id',
        'password',
        'email',
        'Fecha_registro',
        'Token_verificacion',
        'Verificada',
        'idCentro_medico',
        'idTipo_usuario',
        'Estado'

    ];
    //protected $table = 'user';
    public $timestamps = false;
    protected $hidden=['password','Token_verificacion','Verificada','Estado'];


    public static function generateToken(){

        return str_random(40);
    }
}
