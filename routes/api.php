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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('cliente', 'App\Http\Controllers\ApiController@cadastraCliente');
Route::put('cliente/{id}', 'App\Http\Controllers\ApiController@atualizaCliente');
Route::delete('cliente/{id}','App\Http\Controllers\ApiController@deleteCliente');
Route::get('cliente/{id}', 'App\Http\Controllers\ApiController@consultaCliente');
Route::get('cliente', 'App\Http\Controllers\ApiController@consultaTodosClientes');
Route::get('consulta/final-placa/{placa}', 'App\Http\Controllers\ApiController@consultaPlacaCliente');

