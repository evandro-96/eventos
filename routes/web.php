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
Route::get('festival/coreografia{id}', 'CoreografiaController@destroyCoreografiaElenco');

Route::group(['prefix' => 'avaliacao'], function () {
    Route::get('avaliar', 'JuradosController@avaliacao')->name('avaliacao.avaliar');
    Route::post('avaliar/salvar', 'JuradosController@avaliacaoSalvar')->name('avaliacao.salvar');
    Route::get('lista', 'JuradosController@index')->name('avaliacao.lista');
    Route::post('lista/relatorio', 'JuradosController@gerarRelatorio')->name('avaliacao.lista.relatorio');
});