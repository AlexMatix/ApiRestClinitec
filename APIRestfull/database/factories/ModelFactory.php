<?php

use App\Centro_medico;
use App\Medicos;
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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(Centro_medico::class, function (Faker\Generator $faker) {

    return [
        'Nombre'    => $faker->word,
        'Direccion' => $faker->address,
        'Estado'    => randomElement([Centro_medico::ACTIVA, Centro_medico::NO_ACTIVO]),
    ];
});


$factory->define(Medicos::class, function (Faker\Generator $faker) {

	$Centro_medico = Centro_medico::all()->random();

    return [
        'Nombre'           => $faker->firstNameMale,
        'Apellido' 		   => $faker->lastName,
    	'Especialidad'     => $faker->company,
        'Sexo'    	       => $faker->randomElement([Medicos::MALE, Medicos::FEMALE]),
        'Edad' 		       => $faker->random_int(20, 40),
        'Cedula' 	       => $faker->str_random(10),
        'Direccion' 	   => $faker->address,
        'id_Centro_medico' => $faker->$Centro_medico->id,
        'Estado' 		   => $faker->randomElement([Medicos::ACTIVO, Medicos::NO_ACTIVO]),

    ];
});


$factory->define(Usuarios_sistema::class, function (Faker\Generator $faker) {
	static $password;

    return [
        'Usuario' 		      => $faker->name,
        'Password' 			  => $password ?: $password = bcrypt('secret'),
        'Email' 			  => $faker->unique()->safeEmail, 
        'Fecha_registro' 	  => $faker->date,
        'Token_verificacion'  => Usuarios_sistema::generateToken(),
        'Verificada'		  => $faker->randomElement(Usuarios_sistema::VERIFICADA, Usuarios_sistema::NO_VERIFICADA),
        'idMedico' 		      => $faker->word,
        'idEnfermera'         => $faker->word,
        'idCentro_medico'     => $faker->word,
        'idTipo_usuario'      => $faker->word,
        'Estado'              => $faker->randomElement([Usuarios_sistema::ACTIVA, Usuarios_sistema::NO_ACTIVA]),

    ];
});


$factory->define(Suscripciones::class, function (Faker\Generator $faker) {

    return [
        'Tipo_suscripcion'    => $faker->word,
        'Nombre_persona' => $faker->paragraph(1),
        'Apellidos_persona'    => $faker->randomElement([Centro_medico::ACTIVA, Centro_medico::NO_ACTIVO]),
        'Fecha_inscripcion' => $faker,
        'Cedula' => $faker,
        'idCentro_medico' => $faker,
        'idUsuarios_sistema' => $faker,
        'Estado' => $faker,
    ];
});





