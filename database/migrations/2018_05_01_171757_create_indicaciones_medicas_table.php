<?php

use App\Indicaciones_medicas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicacionesMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicaciones_medicas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Dieta');
            $table->text('Esquema_soluciones');
            $table->text('Lista_medicamentos');
            $table->text('Medias_generales');
            $table->text('Hemocomponentes')->nullable();
            $table->integer('idConsulta')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Indicaciones_medicas::ACTIVO);

            //Llaves foraneas
            $table->foreign('idConsulta')->references('id')->on('consultas');
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
        Schema::dropIfExists('indicaciones_medicas');
    }
}
