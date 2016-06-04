<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lugar', 'LugarController');
Route::resource('camara', 'CamaraController');
Route::resource('miembro', 'MiembroController', ['except' => ['edit', 'destroy', 'create', 'update', 'store'] ]);
Route::resource('miembro.placa', 'PlacaController', ['except' => ['index'] ]);
Route::resource('registros', 'RegistroController');
Route::get('registros/get/{filename}', [
	'as' => 'getentry', 'uses' => 'RegistroController@get']);

Route::get('/db', function(){
	return DB::table('lugar')->insertGetId(['nombre' => 'UPSA2']);
});

Route::get('/reportes/placas', 'ReportsController@placas');

