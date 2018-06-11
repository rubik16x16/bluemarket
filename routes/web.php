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

Route::get('/', 'User\IndexController@index')->name('user.index');

// Login / Registro

Route::middleware(['Guest'])->group(function(){

	Route::get('/login', 'User\Auth\LoginController@get')->name('user.login.get');

	Route::post('/login', 'User\Auth\LoginController@post')->name('user.login.post');

	Route::get('/registro', 'User\Auth\RegistroController@get')->name('registro.get');

	Route::post('/registro', 'User\Auth\RegistroController@post')->name('registro.post');

});

Route::get('/logout', function(){

	session()->forget('usuario');

	return redirect(route('user.index'));

})->name('user.logout');
