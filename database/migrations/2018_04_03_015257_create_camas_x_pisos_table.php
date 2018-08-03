<?php

use App\Camas_x_piso;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamasXPisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camas_x_piso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Piso',20);
            $table->string('Seccion',50);
            $table->string('Descripcion',250)->nullable();
            $table->integer('Ocupado')->default(Camas_x_piso::CAMA_LIBRE);
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Camas_x_piso::ACTIVA);

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
        Schema::dropIfExists('camas_x_piso');
    }
}
