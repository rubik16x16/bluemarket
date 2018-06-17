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

//**************************** Guest ********************************

// Login / Registro

Route::middleware(['Guest'])->group(function(){

	Route::get('/login', 'User\Auth\LoginController@get')->name('user.login.get');

	Route::post('/login', 'User\Auth\LoginController@post')->name('user.login.post');

	Route::get('/registro', 'User\Auth\RegistroController@get')->name('registro.get');

	Route::post('/registro', 'User\Auth\RegistroController@post')->name('registro.post');

});

//****************************** Auth *************************************

// Perfil

Route::middleware(['Auth'])->prefix('perfil')->group(function(){

	Route::resource('/productos', 'User\Perfil\productosController', [
		'names' => [
			'index' => 'user.productos.index',
			'create' => 'user.productos.create',
			'store' => 'user.productos.store',
			'show' => 'user.productos.show',
			'edit' => 'user.productos.edit',
			'update' => 'user.productos.update',
			'destroy' => 'user.productos.destroy'
		]
	]);

	// Eliminar imagenes

	Route::delete('/imagen/{id}', 'User\imagenesController@destroy')->name('user.imagenes.destroy');

	// Compras

	Route::get('/compras', 'User\Perfil\operacionesController@comprasGet')->name('user.compras.get');

	Route::post('/compras', 'User\Perfil\operacionesController@comprasPost')->name('user.compras.post');

});

Route::get('/logout', function(){

	session()->forget('usuario');

	return redirect(route('user.index'));

})->name('user.logout');

// ***************************** All ************************************

Route::get('/', 'User\IndexController@index')->name('user.index');

Route::get('/producto/{id}', 'User\productosController@show')->name('user.public.producto.show');

require __DIR__ . '/adminRoutes.php';
