<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comentario;
use App\Models\Usuario;

class comentariosController extends Controller{

  public function index(){

    return view('user.perfil.comentariosIndex', [
      'comentarios' => Usuario::find(session('usuario.id'))->comentariosCompras()->with('producto', 'producto.imagenes')->get()

    ]);

  }

  public function store_comentario(Request $request, $id){

    $comentario= new Comentario([
      'comentario' => $request->comentario,
      'producto_id' => $id,
      'comprador_id' => session('usuario.id')
    ]);

    $comentario->save();

    return json_encode($comentario->toArray());

  }

  public function store_respuesta(Request $request , $id){

    $comentario= Comentario::find($id);
    $comentario->respuesta= $request->respuesta;
    $comentario->save();

    return $request->respuesta . $id;

  }

}
