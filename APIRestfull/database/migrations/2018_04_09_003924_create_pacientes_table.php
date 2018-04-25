<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('Nombre', 45);
            $table->string('Apellidos', 70);
            $table->string('Telefono', 15)->nullable();
            $table->string('Sexo', 2);
            $table->integer('Edad');
            $table->string('Direccion', 50)->nullable();
            $table->string('Tipo_sangre', 15)->nullable();
            $table->date('Fecha_inscripcion');
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned();
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
