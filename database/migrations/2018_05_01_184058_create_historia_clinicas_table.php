<?php

use App\Historia_clinica;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('Historia_clinica');
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Historia_clinica::ACTIVA);

            //Laves foraneas
            $table->foreign('idPaciente')->references('id')->on('pacientes');
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
        Schema::dropIfExists('historia_clinicas');
    }
}
