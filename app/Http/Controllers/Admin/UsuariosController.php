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

}
