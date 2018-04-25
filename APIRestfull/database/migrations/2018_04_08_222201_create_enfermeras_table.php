<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermeras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre', 45);
            $table->string('Apellido', 70);
            $table->string('Sexo', 4);
            $table->integer('Edad');
            $table->string('Cedula',10);
            $table->string('Direccion', 45);
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned();
            //DEFINIMOS LLAVES FORANEAS

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
        Schema::dropIfExists('enfermeras');
    }
}
