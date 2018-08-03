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
            $table->string('Apellidos');
            $table->string('Sexo');
            $table->string('Telefono');
            $table->date('Fecha_nacimiento');
            $table->string('Cedula');
            $table->string('Direccion');
            $table->integer('idUser')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Enfermeras::ACTIVA);
            //DEFINIMOS LLAVES FORANEAS

            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idUser')->references('id')->on('users');
            
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
