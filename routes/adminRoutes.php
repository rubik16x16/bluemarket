<?php

Route::middleware('adminAuth')->group(function(){

  Route::prefix('admin')->group(function(){

    Route::get('/', 'Admin\IndexController@index')->name('admin.index');

    Route::get('/logout', function(){

      session()->forget('admin');

      return redirect(route('admin.index'));

    })->name('admin.logout');

  });

});

Route::middleware('adminGuest')->group(function(){

  Route::prefix('admin')->group(function(){

    Route::get('/login', 'Admin\LoginController@get')->name('admin.login.get');
    Route::post('/login', 'Admin\LoginController@post')->name('admin.login.post');

  });

});
