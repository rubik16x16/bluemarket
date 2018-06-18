<?php

namespace App\Http\Controllers\User\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Operacion;
use App\Models\Producto;
use App\Models\Usuario;

class operacionesController extends Controller
{
  public function comprasGet(){

    $compras= Usuario::find(session('usuario.id'))->compras()->with('producto')->get();

    foreach ($compras as $compra) {
      $compra->total= $compra->total();
    }

    return view('user.perfil.compras.index', ['compras' => $compras]);

  }

  public function comprasPost(Request $request){

    $producto= Producto::find($request->producto);

    $datos= [
      'comprador_id' => session('usuario.id'),
      'vendedor_id' => $producto->usuario()->get()->first()->id,
      'producto_id' => $producto->id,
      'cantidad' => $request->cantidad
    ];

    $producto->existencia-= $request->cantidad;
    $operacion= new Operacion($datos);
    $operacion->save();
    $producto->save();

    return redirect(route('user.public.producto.show', ['id' => $producto->id]));

  }

  public function ventasGet(){

    $ventas= Usuario::find(session('usuario.id'))->ventas()->get()->load('producto');

    foreach($ventas as $venta){

      $venta->total = $venta->total();

    }

    return view('user.perfil.ventas', ['ventas' => $ventas]);

  }

}
