<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class UsuariosController extends Controller{

  public function index(){

    return view('admin.usuarios.index',[
      'usuarios' => Usuario::all()
    ]);

  }

  public function comentarios($id){

    $usuario= Usuario::find($id);
    $comentarios= $usuario->comentariosCompras->concat($usuario->comentariosVentas());
    $comentarios->each(function($comentario){
      $comentario->load('producto');
    });

    return view('admin.usuarios.comentarios', [
      'comentarios' => $comentarios
    ]);

  }

}
