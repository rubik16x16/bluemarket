<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class RegistroController extends Controller
{
    //

	public function get(Request $request){

		$emailError= $request->session()->get('email_error');
		return view('user.auth.registro', ['email_error' => $emailError]);

	}

	public function post(Request $request){

		$usuario= Usuario::where('email', $request->get('email'))->first();

		if($usuario == null){

			$usuario= new Usuario($request->all());
			$usuario->save();

			$request->session()->put('usuario', $usuario);

			return redirect(route('user.index'));

		}

		$request->session()->flash('email_error', 'Usuario ya registrado');

		return redirect(route('registro.get'));

	}

}
