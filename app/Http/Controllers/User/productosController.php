<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;

class productosController extends Controller{

  public function show($id){

    $producto= Producto::find($id);
    $producto->usuario= $producto->usuario()->get()->first();
    $producto->imagenes= $producto->imagenes()->get();

    return view('user.productoView', ['producto' => $producto]);

  }

}
