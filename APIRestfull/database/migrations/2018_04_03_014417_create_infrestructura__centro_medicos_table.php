<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfrestructuraCentroMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrestructura_centro_medico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCentro_medico')->unsigned();
            $table->text('Infrestructura_centro_medico');
            $table->integer('Estado')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('infrestructura_centro_medico');
    }
}
