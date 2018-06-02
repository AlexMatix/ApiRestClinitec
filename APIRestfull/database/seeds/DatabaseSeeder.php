<?php

use App\Citas_agendadas;
use App\Almacenes;
use App\Cajas;
use App\Camas_x_piso;
use App\Centro_medico;
use App\Cirugias;
use App\Cirugias_x_paciente;
use App\Consultas;
use App\Enfermeras;
use App\Farmacias;
use App\Infrestructura_Centro_medico;
use App\Medicos;
use App\Pacientes;
use App\Recetas;
use App\Suscripciones;
use App\Tipo_usuario;
use App\Urgencias;
use App\User;
use App\Vacunas;
use App\Vacunas_x_paciente;
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

        Centro_medico::truncate();
        Camas_x_piso::truncate();
        Enfermeras::truncate();
        Infrestructura_Centro_medico::truncate();
        Medicos::truncate();
        Pacientes::truncate();
        Suscripciones::truncate();
        Tipo_usuario::truncate();
        User::truncate();
        Cirugias::truncate();
        Almacenes::truncate();
        Farmacias::truncate();
        Cajas::truncate();
        Consultas::truncate();
        Recetas::truncate();
        Urgencias::truncate();
        Vacunas::truncate();
        Vacunas_x_paciente::truncate();
        Camas_x_piso::truncate();
        Cirugias_x_paciente::truncate();
        Citas_agendadas::truncate();
        

        //Variables para la cantidad de datos creados por tabla

        $cantidadCentrosMedicos  = 10;
        $cantidadMedicos         = 50;
        $cantidadEnfermeras      = 50;
        $cantidadPacientes       = 50;
        $cantidadUsuariosSistema = 50;
        $cantidadSuscripciones   = 10;
        $cantidadCirugias        = 40;
        $cantidadAlmacenes       = 20;
        $cantidadFarmacias       = 40;
        $cantidadCajas           = 40;
        $cantidadConsultas       = 40;
        $cantidadRecetas         = 40;
        $cantidadUrgencias       = 40;
        $cantidadVacunas         = 40;
        $cantidadUrgencias       = 40;

        factory(Centro_medico::class, $cantidadCentrosMedicos)->create();
        factory(Medicos::class, $cantidadMedicos)->create();
        factory(Enfermeras::class, $cantidadEnfermeras)->create();
        factory(Pacientes::class, $cantidadPacientes)->create();
        factory(User::class, $cantidadUsuariosSistema)->create();
        factory(Suscripciones::class, $cantidadSuscripciones)->create();
        factory(Cirugias::class, $cantidadCirugias)->create();
        factory(Almacenes::class, $cantidadAlmacenes)->create();
        factory(Farmacias::class, $cantidadFarmacias)->create();
        factory(Cajas::class, $cantidadCajas)->create();
        factory(Consultas::class, $cantidadConsultas)->create();
        factory(Recetas::class, $cantidadRecetas)->create();
        factory(Urgencias::class, $cantidadUrgencias)->create();
        factory(Vacunas::class, $cantidadVacunas)->create();
        factory(Vacunas_x_paciente::class, $cantidadUrgencias)->create();
        factory(Camas_x_piso::class, $cantidadUrgencias)->create();
        factory(Cirugias_x_paciente::class, $cantidadUrgencias)->create();
        factory(Citas_agendadas::class, $cantidadUrgencias)->create();
    }
}
