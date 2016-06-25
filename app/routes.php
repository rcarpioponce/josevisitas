<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', array('uses'=>'HomeController@showWelcome'));

Route::get('/', function(){
	return View::make('visitas.login');
});
Route::post('/', array('uses' => 'AuthController@login'));
Route::get('/logout', function(){
	Auth::logout();
	return \Redirect::to('/');;
});
Route::get('/mantenimiento', array('uses' => 'MantenimientoController@index'));
Route::post('/mantenimiento', array('uses' => 'MantenimientoController@addUsuario'));


Route::get('/admin', function()
{
	return View::make('layouts.layout');
});

Route::get('/correos', array('uses'=> 'MailController@index'));
Route::post('/correos', array('uses'=> 'MailController@sendMail'));
Route::get('/registro', array('uses' => 'RegistroController@index'));
Route::post('/registro', array('uses' => 'RegistroController@saveVisita'));
Route::get('/lista', array('uses' => 'RegistroController@listaVisita'));

Route::get('correos/carreras/{cod}',function($cod){
	return \DB::table('persona')
							->join('visita','persona.Cod_Persona','=','visita.Cod_Persona')
							->join('carreras','visita.Cod_carrera','=','carreras.Cod_carrera')
							->select(\DB::raw('persona.*'),'visita.Fec_Reg',\DB::raw('carreras.Descripcion as carrera'))->
							where('visita.Cod_carrera','=',$cod)->get();
});