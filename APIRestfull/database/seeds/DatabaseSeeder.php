<?php

use App\Camas_x_piso;
use App\Centro_medico;
use App\Enfermeras;
use App\Infrestructura_Centro_medico;
use App\Medicos;
use App\Pacientes;
use App\Suscripciones;
use App\Tipo_usuario;
use App\Usuarios_sistema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	//Desactivamos la revision de las llaves foraneas.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        //trunco las tablas para poder meter datos nuevos

        //Centro_medico::truncate();
        Camas_x_piso::truncate();
        Enfermeras::truncate();
        Infrestructura_Centro_medico::truncate();
        Medicos::truncate();
        Pacientes::truncate();
        Suscripciones::truncate();
        Tipo_usuario::truncate();
        Usuarios_sistema::truncate();

        //Variables para la cantidad de datos creados por tabla

        $cantidadCentrosMedicos  = 3;
        $cantidadMedicos         = 50;
        $cantidadEnfermeras      = 50;
        $cantidadPacientes       = 50;
        $cantidadUsuariosSistema = 50;
        $cantidadSuscripciones   = 3;

        //factory(Centro_medico::class, $cantidadCentrosMedicos)->create();
        factory(Medicos::class, $cantidadMedicos)->create();
        factory(Enfermeras::class, $cantidadEnfermeras)->create();
        factory(Pacientes::class, $cantidadPacientes)->create();
        factory(Usuarios_sistema::class, $cantidadUsuariosSistema)->create();
        factory(Suscripciones::class, $cantidadSuscripciones)->create();
    }
}
