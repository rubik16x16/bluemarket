<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comentario;
use App\Models\Usuario;

class comentariosController extends Controller{

  public function index(){

    $usuario= Usuario::find(session('usuario.id'));
    $comentarios= $usuario->comentariosCompras()->with('producto', 'producto.imagenes')->get();

    return view('user.perfil.comentarios.index', [
      'comentarios' => str_replace('"', "'", $comentarios->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'update' => route('user.comentarios.store_respuesta', ['id'])
      ]))
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
