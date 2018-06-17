<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;

class productosController extends Controller{

  public function show($id){

    $producto= Producto::find($id)->load(['imagenes', 'usuario']);

    return view('user.productoView', ['producto' => $producto]);

  }

}
