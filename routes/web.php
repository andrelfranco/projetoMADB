<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::resource('/', 'WelcomeController');

Route::get('/', 'WelcomeController@index');

Route::resource('teste','TesteController');

//Route::get('usuario/meu_perfil', 'UsuarioController@getPerfil')->name('usuario.getPerfil');
Route::resource('usuario','UsuarioController')->middleware('auth');;
Route::resource('servico', 'ServicoController')->middleware('auth');;

//Route::resource('contrato', 'ContratoController')->middleware('auth');;

Route::group(['prefix' => 'contrato', 'as' => 'contrato.'], function() {
    Route::name('create')->get('{servico}/create', 'ContratoController@create')->middleware('auth');;
    Route::name('store')->post('{servico}/store', 'ContratoController@store')->middleware('auth');;
});

Route::group(['prefix' => '/'], function(){
	Route::name('meu-perfil')->get('meu-perfil', 'ProfileController@getPerfil')->middleware('auth');
	Route::name('avaliacao')->patch('avaliacao/{contrato}', 'ProfileController@storeAvaliacao')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
