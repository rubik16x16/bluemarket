<?php

namespace App\Http\Controllers\User\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\ProductoImagen;

class ProductosController extends Controller{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){

		$usuario= Usuario::find(1);
		return response()->json($usuario->productos->load(['usuario', 'categoria'])->toArray());
	}//end index

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){

		$producto= new Producto($request->all());
		$producto->usuario_id= session('usuario.id');
		$producto->save();

		$orden= 1;
		foreach($request->file() as $file){

			$imagen= new ProductoImagen([
				'src' => $file->store('imgs', 'public'),
				'producto_id' => $producto->id,
				'orden' => $orden++
			]);

			$imagen->save();

		}

		return redirect(route('user.productos.index'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){

		$producto= Producto::find($id)->load('imagenes', 'comentarios');

		return view('user.perfil.productos.show', [
			'producto' =>$producto
		]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){

		$producto= Producto::find($id);

		if($producto->usuario->id == session('usuario.id')){

			$producto->fill($request->all());
			$producto->save();

			$orden= 1;
			foreach($request->file() as $file){

				$imagen= new ProductoImagen([
					'src' => $file->store('imgs', 'public'),
					'producto_id' => $producto->id,
					'orden' => $orden++
				]);

				$imagen->save();

			}

			return redirect(route('user.productos.index'));

		}

		return 'Usuario invalido';

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		$producto= Producto::find($id);
		$imgs= $producto->imagenes()->get()->map(function($img){

			return $img->src;

		})->toArray();

		Storage::disk('public')->delete($imgs);
		$producto->delete();

	}
}
