<?php

use App\Infrestructura_Centro_medico;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrestructuraCentroMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrestructura_centro_medico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCentro_medico')->unsigned();
            $table->text('Infrestructura_centro_medico');
            $table->integer('Estado')->unsigned()->default(Infrestructura_Centro_medico::ACTIVO);
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
        Schema::dropIfExists('infrestructura_centro_medico');
    }
}
