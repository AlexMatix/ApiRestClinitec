<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//el parametro only solo permite los metodos de su parametro
//Route::resource('suscripciones', 'Suscripciones\SuscripcionesController', ['only' => ['index', 'show']]);
// *************                                 *****************     ***  ['except' => ['index','show']] excluye los metodos del arreglo




Route::resource('suscripciones', 'Suscripciones\SuscripcionesController');

Route::resource('centro-medico', 'CentroMedico\CentroMedicoController');

Route::resource('medicos', 'Medicos\MedicosController');

Route::resource('enfermeras', 'Enfermeras\EnfermerasController');

Route::resource('pacientes', 'Pacientes\PacientesController');

Route::resource('usuarios', 'UsuariosSistema\UsuariosSistemaController');

Route::resource('infrestructura', 'InfrestructuraCentroMedico\InfrestructuraCentroMedicoController');

Route::resource('camas', 'CamasXPiso\CamasXPisoController');

Route::resource('tipo-usuario', 'TipoUsuario\TipoUsuarioController');



