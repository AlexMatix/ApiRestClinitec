<?php

use App\Cirugias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirugias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Riesgos');
            $table->float('Costos')->unsigned();
            $table->integer('Duracion')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Cirugias::ACTIVA);
            //Llaves foraneas
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
        Schema::dropIfExists('cirugias');
    }
}
