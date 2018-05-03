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
// *************                                 *****************     ***  ['except' => ['create','edit']] excluye los metodos del arreglo
Route::get('breweries', ['middleware' => 'cors', function()
{
    return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
}]);

Route::resource('suscripciones', 'Suscripciones\SuscripcionesController', ['except' => ['create','edit']]);

Route::resource('centro-medico', 'CentroMedico\CentroMedicoController', ['except' => ['create','edit']]);

Route::resource('medicos', 'Medicos\MedicosController', ['except' => ['create','edit']]);

Route::resource('enfermeras', 'Enfermeras\EnfermerasController', ['except' => ['create','edit']]);

Route::resource('pacientes', 'Pacientes\PacientesController', ['except' => ['create','edit']]);

Route::resource('usuarios', 'UsuariosSistema\UsuariosSistemaController', ['except' => ['create','edit']]);

//Route::resource('infrestructura', 'InfrestructuraCentroMedico\InfrestructuraCentroMedicoController');

Route::resource('camas', 'CamasXPiso\CamasXPisoController', ['except' => ['create','edit']]);

Route::resource('tipo-usuario', 'TipoUsuario\TipoUsuarioController', ['except' => ['create','edit']]);



