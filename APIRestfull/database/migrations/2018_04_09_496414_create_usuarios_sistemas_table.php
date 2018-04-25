<?php

use App\Usuarios_sistema;
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
        Schema::create('usuarios_sistema', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('Usuario',30)->unique();
            $table->string('Password');
            $table->string('Email', 50)->unique();
            $table->date('Fecha_registro');
            $table->string('Token_verificacion', 40)->nullable();
            $table->integer('Verificada')->default(Usuarios_sistema::NO_VERIFICADA)->nullable();
            $table->integer('idCentro_medico')->unsigned();
            $table->integer('idMedico')->default(1)->unsigned()->nullable();
            $table->integer('idEnfermera')->default(1)->unsigned()->nullable();
            $table->integer('idPaciente')->default(1)->unsigned()->nullable();
            $table->integer('idTipo_usuario')->default(1)->unsigned();
            $table->integer('Estado')->unsigned()->default(Usuarios_sistema::ACTIVA);

            //DEFINIMOS LOS CAMPOS QUE SERÄN LLAVES FORANEAS

            $table->foreign('idCentro_medico')->references('id')->on('centro_medico');
            $table->foreign('idMedico')->references('id')->on('medicos');
            $table->foreign('idEnfermera')->references('id')->on('enfermeras');
            $table->foreign('idPaciente')->references('id')->on('pacientes');
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
        Schema::dropIfExists('usuarios_sistema');
    }
}
