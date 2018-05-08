<?php

use App\Pago_plazos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoPlazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_plazos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cantidad_pagos')->unsigned();
            $table->float('Monto_pagos')->unsigned();
            $table->integer('Dia_corte')->unsigned();
            $table->text('Pagos')->nullable();
            $table->date('Fecha_limite');
            $table->integer('idCaja')->unsigned();
            $table->integer('idUsuario_sistema')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(Pago_plazos::NO_PAGADO);

            //LLaves foraneas
            $table->foreign('idUsuario_sistema')->references('id')->on('users');
            $table->foreign('idCaja')->references('id')->on('cajas');
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
        Schema::dropIfExists('pago_plazos');
    }
}
