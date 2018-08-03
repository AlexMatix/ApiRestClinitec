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
            $table->string('Telefono')->unique();
            $table->date('Fecha_nacimiento');
            $table->string('Cedula');
            $table->string('Direccion');
            $table->mediumText('InfoApp');
            $table->integer('idUser')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Medicos::ACTIVO);

            //Definimos llaves primarias

            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idUser')->references('id')->on('users');


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
