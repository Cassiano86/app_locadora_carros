<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('cliente', 'App\Http\Controllers\ClienteController');
// Route::apiResource('cliente', 'App\Http\Controllers\ClienteController')->middleware('jwt.auth');
// Route::apiResource('carro', 'App\Http\Controllers\CarroController')->middleware('jwt.auth');
// Route::apiResource('locacao', 'App\Http\Controllers\LocacaoController')->middleware('jwt.auth');
// Route::apiResource('marca', 'App\Http\Controllers\MarcaController')->middleware('jwt.auth');
// Route::apiResource('modelo', 'App\Http\Controllers\ModeloController')->middleware('jwt.auth');

// Rota pré-fixada e que só pode ser acessada via autorização
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'v1'], function(){
    Route::apiResource('cliente', 'App\Http\Controllers\ClienteController');
    Route::apiResource('carro', 'App\Http\Controllers\CarroController');
    Route::apiResource('locacao', 'App\Http\Controllers\LocacaoController');
    Route::apiResource('marca', 'App\Http\Controllers\MarcaController');
    Route::apiResource('modelo', 'App\Http\Controllers\ModeloController');

    Route::post('me', 'App\Http\Controllers\ControllerLogin@me');
    Route::post('refresh', 'App\Http\Controllers\ControllerLogin@refresh');
    Route::post('logout', 'App\Http\Controllers\ControllerLogin@logout');
});

Route::post('login', 'App\Http\Controllers\ControllerLogin@login');