<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

	public function index(Request $request){

		$usuario= $request->session()->get('usuario');

		return view('user.index', ['usuario' => $usuario]);

	}

}
