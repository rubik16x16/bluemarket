<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;
use App\Models\Categoria;

class IndexController extends Controller
{

	public function index(Request $request){

		return view('user.index', [
			'productos' => str_replace('"', "'", Producto::all()->load('imagenes')->toJson()),
			'routes' => str_replace('"', "'", json_encode([
				'show' => route('user.public.producto.show', ['id']),
				'img' => asset('storage/')
			])),
			'categorias' => Categoria::all()
		]);

	}

}
