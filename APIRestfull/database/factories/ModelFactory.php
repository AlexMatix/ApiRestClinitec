<?php

use App\Centro_medico;
use App\Enfermeras;
use App\Medicos;
use App\Pacientes;
use App\Suscripciones;
use App\Usuarios_sistema;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(Centro_medico::class, function (Faker\Generator $faker) {

    return [
        'Nombre'    => $faker->lastName,
        'Direccion' => $faker->state,
        'Tipo_centro_medico' => $faker->randomElement([Centro_medico::CONSULTORIO,Centro_medico::CLINICA,Centro_medico::HOPITAL_BASICO,Centro_medico::HOPITAL_PREMIUM]),
    ];
});

$factory->define(Medicos::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'           => $faker->lastName,
        'Apellidos' 		   => $faker->lastName,
    	'Especialidad'     => $faker->company,
        'Sexo'    	       => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		       => $faker->numberBetween($min = 20, $max = 40),
        'Cedula' 	       => str_random(10),
        'Direccion' 	   => $faker->state,
        'idCentro_medico'  => $Centro_medico->id,
        'Estado' 		   => $faker->randomElement([Medicos::ACTIVO, Medicos::NO_ACTIVO]),

    ];
});

$factory->define(Enfermeras::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'           => $faker->lastName,
        'Apellido' 		   => $faker->lastName,
        'Sexo'    	       => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		       => $faker->numberBetween($min = 20, $max = 40),
        'Cedula' 	       => str_random(10),
        'Direccion' 	   => $faker->state,
        'idCentro_medico' => $Centro_medico->id,
        'Estado' 		   => $faker->randomElement([Enfermeras::ACTIVA, Enfermeras::NO_ACTIVA]),

    ];
});


$factory->define(Pacientes::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'            => $faker->lastName,
        'Apellidos' 		=> $faker->lastName,
        'Telefono' 		    => $faker->randomElement(['2221714946', '2461034037', '2221034037']),
        'Sexo'    	        => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		        => $faker->numberBetween($min = 20, $max = 40),
        'Direccion' 	    => $faker->state,
        'Tipo_sangre' 	    => str_random(4),
        'idCentro_medico'  => $Centro_medico->id,
        'Fecha_inscripcion' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Estado' 		    => $faker->randomElement([Pacientes::ACTIVO, Pacientes::NO_ACTIVO]),

    ];
});



$factory->define(Usuarios_sistema::class, function (Faker\Generator $faker) {
	static $password;

    return [
        'Usuario' 		      => $faker->username,
        'Password' 			  => $password ?: $password = bcrypt('secret'),
        'Email' 			  => $faker->safeEmail, 
        'Fecha_registro' 	  => $faker->date,
        'Token_verificacion'  => Usuarios_sistema::generateToken(),
        'Verificada'		  => $faker->randomElement([Usuarios_sistema::VERIFICADA, Usuarios_sistema::NO_VERIFICADA]),
        'idCentro_medico'     => $faker->numberBetween($min = 0, $max = 50),
        'idMedico' 		      => $faker->numberBetween($min = 0, $max = 50),
        'idEnfermera'         => $faker->numberBetween($min = 0, $max = 50),
        'idPaciente'          => $faker->numberBetween($min = 0, $max = 50),
        'idTipo_usuario'      => $faker->randomElement([Usuarios_sistema::SUPERADMIN, Usuarios_sistema::ADMINISTRADOR, Usuarios_sistema::MEDICO, Usuarios_sistema::ENFERMERA, Usuarios_sistema::PACIENTE, Usuarios_sistema::CAJERO]),
        'Estado'              => $faker->randomElement([Usuarios_sistema::ACTIVA, Usuarios_sistema::NO_ACTIVA]),

    ];
});


$factory->define(Suscripciones::class, function (Faker\Generator $faker) {
	$Centro_medico = Centro_medico::all()->random();

    return [
        'Tipo_suscripcion'   => $faker->numberBetween($min = 1, $max = 3),
        'Nombre_persona'     => $faker->lastName,
        'Apellidos_persona'  => $faker->lastName,
        'Fecha_inscripcion'  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Cedula'             => str_random(10),
        'idCentro_medico'    => $Centro_medico->id,
        'idUsuarios_sistema' => $faker->numberBetween($min = 0, $max = 50),
        'Estado'             => $faker->randomElement([Suscripciones::ACTIVA, Suscripciones::SUSPENDIDA, Suscripciones::ELIMINADA]),
    ];
});





