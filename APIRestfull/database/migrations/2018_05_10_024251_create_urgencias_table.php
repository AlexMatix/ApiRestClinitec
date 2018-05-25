<?php

use App\Urgencias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urgencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Motivo');
            $table->string('Prioridad');
            $table->date('Fecha_ingreso');
            $table->date('Fecha_egreso');
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Urgencias::ACTIVO);

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
        Schema::dropIfExists('urgencias');
    }
}
