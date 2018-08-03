<?php

use App\Cirugias_x_paciente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirugiasXPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirugias_x_pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha_ingreso');
            $table->date('Fecha_egreso')->nullable();
            $table->integer('idCama')->unsigned();
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCirugia')->unsigned();
            $table->integer('idMedico')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Cirugias_x_paciente::ACTIVO);

            //llaves foraneas

            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->foreign('idMedico')->references('id')->on('tipo_usuario');
            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idCirugia')->references('id')->on('cirugias');
            $table->foreign('idCama')->references('id')->on('camas_x_piso');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cirugias_x_pacientes');
    }
}
