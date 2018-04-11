<?php

use App\Camas_x_piso;
use App\Centro_medico;
use App\Enfermeras;
use App\Infrestructura_Centro_medico;
use App\Medicos;
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
        
    	//Desactivamos la revicion de las llaves foraneas.
        DB::statement('SET FOREIGN_KEYS_CHECKS = 0');
        
        //trunco las tablas para poder meter datos nuevos
        Camas_x_piso::truncate();
        Centro_medico::truncate();
        Enfermeras::truncate();
        Infrestructura_Centro_medico::truncate();
        Medicos::truncate();
        Suscripciones::truncate();
        Tipo_usuario::truncate();
        Usuarios_sistema::truncate();

    }
}
