<?php

use App\Vacunas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->integer('Edad_aplicar')->unsigned();
            $table->integer('Costo')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Vacunas::ACTIVO);

            //Llaves foranea
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
        Schema::dropIfExists('vacunas');
    }
}
