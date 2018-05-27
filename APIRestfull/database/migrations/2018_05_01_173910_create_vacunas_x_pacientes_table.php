<?php

use App\Vacunas_x_paciente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunasXPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas_x_pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha_aplicacion');
            $table->integer('idPaciente')->unsigned();
            $table->integer('idVacuna')->unsigned();
            $table->integer('idConsulta')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Vacunas_x_paciente::ACTIVO);

            //LLaves foraneas

            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->foreign('idVacuna')->references('id')->on('vacunas');
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
        Schema::dropIfExists('vacunas_x_pacientes');
    }
}
