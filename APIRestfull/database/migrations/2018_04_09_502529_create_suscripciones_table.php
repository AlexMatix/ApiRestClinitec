<?php

use App\Suscripciones;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Tipo_suscripcion');
            $table->string('Nombre_persona');
            $table->string('Apellidos_persona');
            $table->date('Fecha_inscripcion');
            $table->string('Cedula')->nullable();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('idUsuarios_sistema')->unsigned();
            $table->integer('Estado')->default(Suscripciones::ACTIVA);

            //Definir llaves foraneas corrspondientes a las tablas.
            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idUsuarios_sistema')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscripciones');
    }
}
