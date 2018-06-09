<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class LoginController extends Controller
{
    //

	public function get(Request $request){

		return view('user.auth.login');

	}

	public function post(Request $request){

		$usuario= Usuario::where('email', $request->get('email'))->first();

		if($usuario == null){

			$request->session()->flash('error', 'Usuario inexistente');
			$request->session()->flash('email', $request->get('email'));
			$request->session()->flash('clave', $request->get('clave'));

			return redirect(route('user.login.get'));

		}

		if(! password_verify($request->get('clave'), $usuario->clave)){

			$request->session()->flash('error', 'Clave invalida');
			$request->session()->flash('email', $request->get('email'));

			return redirect(route('user.login.get'));

		}

		$request->session()->put('usuario', $usuario);

		return redirect(route('user.index'));

	}

}
