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

Route::get('/correos', function()
{
	return View::make('visitas.correos');
});
Route::get('/registro', function()
{
	return View::make('visitas.registro');
});