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
Route::get('login',['uses'=>'Auth\AuthController@getLogin','as'=>'login']);
Route::get('/','LoginController@index');
Route::post('/','LoginController@acceder');
Route::get('usuario/','UsuarioController@index');
Route::get('usuario/create','UsuarioController@create');
Route::get('usuario/edit/{id}','UsuarioController@edit');
Route::post('usuario/update/{id}','UsuarioController@update');
Route::get('usuario/destroy/{id}','UsuarioController@destroy');
Route::post('usuario/store','UsuarioController@store');
//Route::resource('usuario','UsuarioController');

Route::get('cliente/','ClienteController@index');
Route::get('cliente/create','ClienteController@create');
Route::get('cliente/edit/{id}','ClienteController@edit');
Route::post('cliente/update/{id}','ClienteController@update');
Route::get('cliente/destroy/{id}','ClienteController@destroy');
Route::post('cliente/store','ClienteController@store');

Route::get('carro/','CarroController@index');
Route::get('carro/create','CarroController@create');
Route::get('carro/edit/{id}','CarroController@edit');
Route::post('carro/update/{id}','CarroController@update');
Route::get('carro/destroy/{id}','CarroController@destroy');
Route::post('carro/store','CarroController@store');
//Route::resource('carro','CarroController');

Route::get('lavado/','LavadoController@index');
Route::get('lavado/create','LavadoController@create');
Route::get('lavado/edit/{id}','LavadoController@edit');
Route::post('lavado/update/{id}','LavadoController@update');
Route::get('lavado/destroy/{id}','LavadoController@destroy');
Route::post('lavado/store','LavadoController@store');

Route::get('lavado/excel','LavadoController@excel');

Route::get('lavado/fecha','LavadoController@fecha');
Route::get('lavado/lista','LavadoController@lista');
//Roportes  pdf
Route::get('pdfMonto','ReporteController@reporteMontoHoy');
Route::get('pdfFecha','ReporteController@fecha');




Route::get('reporte/','ReporteController@index');

Route::post('reporte/rangoFechas','ReporteController@rangoFechas');
Route::get('reporte/carrosLavo','ReporteController@carrosLavo');


Route::get('excel/index','IndexController@actionIndex');
Route::get('xml/lista','XmlController@actionIndex');

//Route::resource('lavado','LavadoController');
//
//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
