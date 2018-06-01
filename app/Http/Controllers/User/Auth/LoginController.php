<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class LoginController extends Controller
{
    //

	public function get(Request $request){

		return view('user.auth.login', [
			'error' => $request->session()->get('error')
		]);

	}

	public function post(Request $request){

		$usuario= Usuario::where('email', $request->get('email'))->first();

		if($usuario == null){

			$request->session()->flash('error', 
				[
					'error' =>'Usuario inexistente',
					'email' => $request->get('email'),
					'clave' => $request->get('clave')
				]);

			return redirect(route('user.login.get'));

		}

		if($usuario->clave != $request->get('clave')){

			$request->session()->flash('error', 
				[
					'error' => 'Clave invalida',
					'email' => $request->get('email')
				]);

			return redirect(route('user.login.get'));

		}

		$request->session()->put('usuario', $usuario);

		return redirect(route('user.index'));

	}

}
