<?php

// ***************************** All ************************************

Route::get('/', 'User\IndexController@index')->name('user.index');

Route::get('/producto/{id}', 'User\productosController@show')->name('user.public.producto.show');

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

Route::middleware(['Auth'])->group(function(){

	Route::prefix('perfil')->group(function(){

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

		Route::get('/compras', 'User\Perfil\operacionesController@comprasIndex')->name('user.compras.index');

		Route::get('/compras/{id}', 'User\Perfil\operacionesController@comprasShow')->name('user.compras.show');

		Route::post('/compras', 'User\Perfil\operacionesController@comprasPost')->name('user.compras.post');

		// Ventas

		Route::get('/ventas', 'User\Perfil\operacionesController@ventasIndex')->name('user.ventas.index');

		Route::get('/ventas/{id}', 'User\Perfil\operacionesController@ventasShow')->name('user.ventas.show');

		Route::get('/comentarios', 'User\comentariosController@index')->name('user.comentarios.index');

	});

	// Comentarios

	Route::post('/producto/{id}/comentarios', 'User\comentariosController@store_comentario')->name('user.comentarios.store_comentario');

	Route::put('/producto/{id}/comentarios', 'User\comentariosController@store_respuesta')->name('user.comentarios.store_respuesta');

	Route::get('/logout', function(){

		session()->forget('usuario');

		return redirect(route('user.index'));

	})->name('user.logout');

});
