<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;

class IndexController extends Controller
{

	public function index(Request $request){

		$productos= Producto::all()->load('imagenes');

		return view('user.index', [
			'productos' => $productos
		]);

	}

}
