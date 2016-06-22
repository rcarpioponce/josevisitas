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

Route::get('/', function()
{
	return View::make('visitas.login');
});

Route::get('/admin', function()
{
	return View::make('layouts.layout');
});

Route::get('/correos', function()
{
	return View::make('visitas.correos');
});
Route::get('/mantenimiento', function()
{
	return View::make('visitas.mantenimiento');
});
Route::get('/registro', function()
{
	return View::make('visitas.registro');
});