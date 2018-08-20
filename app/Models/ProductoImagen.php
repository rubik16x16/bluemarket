<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model{

  protected $table= 'producto_imagenes';
  protected $fillable= ['src', 'producto_id', 'orden'];

  public function producto(){

    return $this->belongsTo('App\Models\Producto');

  }

  public function usuario(){

    return $this->producto()->get()->first()->usuario();

  }

}
