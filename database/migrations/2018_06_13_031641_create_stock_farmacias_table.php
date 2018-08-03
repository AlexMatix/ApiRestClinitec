<?php

use App\StockFarmacia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_farmacia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Cantidad');
            $table->integer('Tipo_accion');
            $table->date('Fecha');
            $table->integer('idFarmacia')->unsigned();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('Estado')->unsigned()->default(StockFarmacia::ACTIVO);
            
            //Llaves foraneas
            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idFarmacia')->references('id')->on('farmacias');
            
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_farmacia');
    }
}
