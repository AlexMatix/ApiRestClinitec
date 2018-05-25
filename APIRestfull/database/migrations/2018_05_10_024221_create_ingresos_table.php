<?php

use App\Ingresos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Fecha_ingreso');
            $table->date('Fecha_egreso');
            $table->integer('idCama')->unsigned();
            $table->integer('idPaciente')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Ingresos::ACTIVO);

            
            $table->foreign('idCama')->references('id')->on('camas_x_piso');
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
        Schema::dropIfExists('ingresos');
    }
}
