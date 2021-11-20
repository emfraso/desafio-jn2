<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('cliente', 'App\Http\Controllers\ApiController@cadastraCliente');
Route::put('cliente/{id}', 'App\Http\Controllers\ApiController@atualizaCliente');
Route::delete('cliente/{id}','App\Http\Controllers\ApiController@deleteCliente');
Route::get('cliente/{id}', 'App\Http\Controllers\ApiController@consultaCliente');
Route::get('cliente', 'App\Http\Controllers\ApiController@consultaTodosClientes');
Route::get('consulta/final-placa/{placa}', 'App\Http\Controllers\ApiController@consultaPlacaCliente');