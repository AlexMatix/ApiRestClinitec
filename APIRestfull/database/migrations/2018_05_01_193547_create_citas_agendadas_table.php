<?php

use App\Citas_agendadas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasAgendadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas_agendadas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Titulo');
            $table->date('Fecha');
            $table->string('Hora_inicio');
            $table->string('Hora_termino');
            $table->integer('idPaciente')->unsigned();
            $table->integer('idMedico')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Citas_agendadas::NO_CONFIRMADA);

            //Llaves foraneas

            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->foreign('idMedico')->references('id')->on('medicos');
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
        Schema::dropIfExists('citas_agendadas');
    }
}
