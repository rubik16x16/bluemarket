<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class RegistroController extends Controller
{
    //

	public function get(Request $request){

		return view('user.auth.registro');

	}

	public function post(Request $request){

		$usuario= Usuario::where('email', $request->get('email'))->first();

		if($usuario == null){

			$usuario= new Usuario();
			$usuario->email= $request->get('email');
			$usuario->clave= password_hash($request->get('clave'), PASSWORD_DEFAULT);
			$usuario->save();

			$request->session()->put('usuario', $usuario);

			return redirect(route('user.index'));

		}

		$request->session()->flash('error', 'Usuario ya registrado');
		$request->session()->flash('email', $request->get('email'));

		return redirect(route('registro.get'));

	}

}
