<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	protected $table= "usuarios";
	protected $fillable= ['email', 'clave', 'estado'];

	protected $hidden = ['clave'];

	public function productos(){

		return $this->hasMany('App\Models\Producto');

	}

	public function compras(){

		return $this->hasMany('App\Models\Operacion', 'comprador_id', 'id');

	}

	public function ventas(){

		return $this->hasMany('App\Models\Operacion', 'vendedor_id', 'id');

	}

	public function comentariosCompras(){

		return $this->hasMany('App\Models\ProductoComentario', 'comprador_id');

	}

	public function comentariosVentas(){

		$productos= $this->productos;
		$comentarios= collect();

		$productos->each(function($producto) use(&$comentarios){
			$comentarios= $comentarios->concat($producto->comentarios);
		});

		return $comentarios;

	}

}
