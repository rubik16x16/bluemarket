<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;
use App\Models\Categoria;

class UserController extends Controller
{

	public function index(Request $request){

		$pagina= $request->query->get('pagina') != NULL ? $request->query->get('pagina') : 1;
		$take= 25;
		$paginas= ceil(Producto::count() / $take);
		$skip= ($pagina -1) * $take;

		$paginado['inicio']= ($pagina - 5) <= 0 ? 1 : $pagina - 5;
		$paginado['fin']= ($pagina + 5) > $paginas ? $paginas : $pagina + 5;
		$paginado['paginas']= $paginas;

		$productos= Producto::take($take)->skip($skip)->get()->load('imagenes');

		return view('user.index', [
			'productos' => str_replace('"', "'", $productos->toJson()),
			'paginado' => $paginado,
			'routes' => str_replace('"', "'", json_encode([
				'show' => route('user.public.producto.show', ['id']),
				'img' => asset('storage/')
			])),
			'categorias' => Categoria::all()
		]);

	}

}
