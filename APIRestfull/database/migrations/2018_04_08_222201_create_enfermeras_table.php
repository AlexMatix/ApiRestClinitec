<?php

use App\Enfermeras;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Sexo');
            $table->integer('Edad');
            $table->string('Cedula');
            $table->string('Direccion');
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Enfermeras::ACTIVA);
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
