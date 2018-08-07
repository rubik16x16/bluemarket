<?php

Route::middleware('adminAuth')->group(function(){

  Route::prefix('admin')->group(function(){

    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::get('/logout', function(){

      session()->forget('admin');

      return redirect(route('admin.index'));

    })->name('admin.logout');

    Route::get('/usuarios', 'Admin\UsuariosController@index')->name('admin.usuarios.index');

    Route::get('/usuarios/{id}/comentarios', 'Admin\UsuariosController@comentarios')
    ->name('admin.usuarios.comentarios');

    Route::resource('/categorias', 'Admin\CategoriasController', [
			'names' => [
				'index' => 'admin.categorias.index',
				'create' => 'admin.categorias.create',
				'store' => 'admin.categorias.store',
				'show' => 'admin.categorias.show',
				'edit' => 'admin.categorias.edit',
				'update' => 'admin.categorias.update',
				'destroy' => 'admin.categorias.destroy'
			]
		]);

  });

});

Route::middleware('adminGuest')->group(function(){

  Route::prefix('admin')->group(function(){

    Route::get('/login', 'Admin\LoginController@get')->name('admin.login.get');
    Route::post('/login', 'Admin\LoginController@post')->name('admin.login.post');

  });

});
