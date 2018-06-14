<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model{

  protected $table= 'imagenes';
  protected $fillable= ['src', 'producto_id', 'orden'];

  public function producto(){

    return $this->belongsTo('App\Models\Producto');

  }

  public function usuario(){

    return $this->producto()->get()->first()->usuario();

  }

}
