<?php

use App\Consultas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Peso')->nullable();
            $table->integer('Talla')->nullable();
            $table->integer('Perimetro_cefalitico')->nullable();
            $table->integer('Perimetro_Torasico')->nullable();
            $table->date('Fecha');
            $table->integer('Costo');
            $table->integer('idMedico')->unsigned();
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Consultas::ACTIVO);


            // Se definen las llaves foraneas

            $table->foreign('idMedico')->references('id')->on('medicos');
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
        Schema::dropIfExists('consultas');
    }
}
