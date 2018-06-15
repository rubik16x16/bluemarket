<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;

class IndexController extends Controller
{

	public function index(Request $request){

		$productos= Producto::all();

		foreach($productos as $producto){

			$producto->imagenes= $producto->imagenes()->get();

		}

		return view('user.index', [
			'productos' => $productos
		]);

	}

}
