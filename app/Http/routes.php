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

Route::get('/', 'Auth\AuthController@getLogin');



Route::resource('contactos', 'ContactosController', ['except' => ['formularioNuevoContacto', 'adminIndex', 'editarContacto', 'buscarContacto']]);
Route::get('nuevoContacto/{userId}', ['as' => 'nuevoContacto', 'uses' => 'ContactosController@formularioNuevoContacto']);
Route::get('adminIndex/{userId}', ['as' => 'admin', 'uses' => 'ContactosController@adminIndex']);
Route::get('editarContacto/{userId}', ['as' => 'editarContacto', 'uses' => 'ContactosController@editarContacto']);
Route::get('buscarContacto/{userId}', ['as' => 'buscarContacto', 'uses' => 'ContactosController@buscarContacto']);
//Route::resource('contactos', 'ContactosController', ['parameters' => [
   // 'contactos.index' => 'userId']]);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@logout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

