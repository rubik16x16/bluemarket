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
			'productos' => Producto::all()->load('imagenes'),
			'categorias' => Categoria::all()
		]);

	}

}
