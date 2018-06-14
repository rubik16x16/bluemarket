<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Imagen;

class imagenesController extends Controller{

  static function destroy($id){

    $imagen= Imagen::find($id);
    $usuario= $imagen->usuario()->get()->first();

    if($usuario->id == session('usuario.id')){

      Storage::disk('public')->delete($imagen->src);
      $imagen->delete();
      return 'true';

    }

    return 'false';

  }

}
