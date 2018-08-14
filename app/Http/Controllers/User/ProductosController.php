<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;

class ProductosController extends Controller{

  public function show($id){

    $producto= Producto::find($id)->load(['imagenes', 'usuario', 'comentarios']);

    return view('user.productos.show', [
      'producto' => str_replace('"', "'", $producto->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'imgPath' => asset('storage/'),
				'comentarios' => [
					'create' => route('user.comentarios.store_comentario', ['id'=> $producto->id])
				]
			]))

    ]);
  }

}
