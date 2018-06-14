<?php

namespace App\Http\Controllers\User\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Imagen;

class productosController extends Controller{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){

		$usuario= Usuario::find(session('usuario.id'));

		return view('user.perfil.productos.index', [
			'productos' => $usuario->productos()->get()->toArray()
		]);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(){

		return view('user.perfil.productos.create');

	}

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

		$orden= 0;
		foreach($request->file() as $file){

			$url= $file->store('imgs', 'public');
			$imagen= new Imagen();
			$imagen->src= $url;
			$imagen->producto_id= $producto->id;
			$imagen->orden= $orden++;
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

		$producto= Producto::find($id);
		$producto->imagenes= $producto->imagenes()->get()->sortBy('orden');

		return view('user.perfil.productos.show', [
			'producto' =>$producto
		]);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id){

		return view('user.perfil.productos.edit', ['producto'=> Producto::find($id)]);

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
		$usuario= $producto->usuario()->get()->first();

		if($usuario->id == session('usuario.id')){

			$producto->fill($request->all());
			$producto->save();

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
