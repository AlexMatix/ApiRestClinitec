<?php

use App\Centro_medico;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_medico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre',50);
            $table->string('Direccion',70);
            $table->integer('Tipo_centro_medico');
            $table->integer('Estado')->unsigned()->default(Centro_medico::NO_CONFIG);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centro_medico');
    }
}
