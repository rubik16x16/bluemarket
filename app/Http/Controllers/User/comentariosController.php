<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comentario;

class comentariosController extends Controller{

  public function store(Request $request, $id){

    $comentario= new Comentario([
      'comentario' => $request->comentario,
      'producto_id' => $id,
      'comprador_id' => session('usuario.id')
    ]);

    $comentario->save();

    return json_encode($comentario->toArray());

  }

}
