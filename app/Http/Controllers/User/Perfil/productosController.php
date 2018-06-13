<?php

namespace App\Http\Controllers\User\Perfil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Producto;
use App\Models\Usuario;

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
		return redirect(route('user.productos.index'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){

		dd(Producto::find($id));

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

		Producto::destroy($id);

	}
}
