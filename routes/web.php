<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('festival/academia', 'AcademiaController');
Route::resource('festival/elenco', 'ElencoController');
Route::resource('festival/coreografia', 'CoreografiaController');

Route::group(['prefix' => 'relatorio'], function () {
    Route::get('avaliacao', 'RelatorioController@notas');
});