<?php

use App\Farmacias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_marca');
            $table->string('Nombre_compuesto');
            $table->string('Precentacion');
            $table->string('Descripcion')->nullable();
            $table->integer('Precio')->unsigned();
            $table->integer('Cantidad');
            $table->integer('Codigo_barras');
            $table->integer('Lote')->nullable();
            $table->date('Caducidad');
            $table->string('Dosis_precentacion');
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('idAlmacen')->unsigned();
            $table->integer('Estado')->unsigned()->default(Farmacias::EXISTENTE);

            //Llaves foraneas
            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idAlmacen')->references('id')->on('almacenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmacias');
    }
}
