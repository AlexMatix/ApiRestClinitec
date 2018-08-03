<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('password');
            $table->string('email')->unique();
            $table->date('Fecha_registro');
            $table->string('Token_verificacion', 40)->nullable();
            $table->integer('Verificada')->default(User::NO_VERIFICADA)->nullable();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('idTipo_usuario')->unsigned();
            $table->integer('Estado')->unsigned()->default(User::ACTIVA);

            //DEFINIMOS LOS CAMPOS QUE SERÄN LLAVES FORANEAS

            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idTipo_usuario')->references('id')->on('tipo_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
