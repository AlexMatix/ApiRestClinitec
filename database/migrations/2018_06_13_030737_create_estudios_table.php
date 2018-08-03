<?php

use App\Estudios;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha');
            $table->string('Tipo_estudio');
            $table->text('Descripcion');
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Estudios::ACTIVO);
            
        //Defino llaves foraneas.
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
        Schema::dropIfExists('estudios');
    }
}
