<?php

use App\Medicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Especialidad');
            $table->string('Sexo');
            $table->integer('Edad')->unsigned();
            $table->string('Cedula');
            $table->string('Direccion');
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Medicos::ACTIVO);

            //Definimos llaves primarias

            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
