<?php

namespace App\Http\Controllers\User\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Operacion;
use App\Models\Producto;

class operacionesController extends Controller
{
  public function comprasGet(){

    $compras= Operacion::where('comprador_id', session('usuario.id'))->get();

    foreach($compras as $compra){

      $compra->producto= Producto::find($compra->producto_id);
      $compra->total= $compra->producto->precio * $compra->cantidad;

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
}
