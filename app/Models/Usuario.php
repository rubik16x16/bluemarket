<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	protected $table= "usuarios";
	protected $fillable= ['email', 'clave'];

	protected $hidden = ['clave'];

	public function productos(){

		return $this->hasMany('App\Models\Producto');

	}

}
