<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_farmacias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cantidad');
            $table->integer('Tipo_accion');
            $table->date('Fecha');
            $table->integer('idFarmacia');
            $table->integer('Estado');
            
            //Llaves foraneas
            $table->foreign('idFarmacia')->references('id')->on('farmacias');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_farmacias');
    }
}
