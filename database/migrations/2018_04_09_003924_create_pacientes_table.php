<?php

use App\Pacientes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Sexo');
            $table->string('Telefono')->default(1);
            $table->string('Celular')->default(1);
            $table->string('Estado_civil')->nullable();
            $table->date('Fecha_nacimiento');
            $table->string('Direccion', 50)->nullable();
            $table->string('Tipo_sangre', 15)->nullable();
            $table->date('Fecha_inscripcion');
            $table->integer('idUser')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Pacientes::ACTIVO);

            //DEFINIMOS LAS LLAVES FORANEAS
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
        Schema::dropIfExists('pacientes');
    }
}
