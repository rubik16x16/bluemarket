<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoComentario extends Model{

  protected $table= 'producto_comentarios';
  protected $fillable= ['producto_id', 'comprador_id', 'comentario', 'respuesta'];

  public function producto(){

    return $this->belongsTo('App\Models\Producto');

  }

  public function comprador(){

    return $this->belongsTo('App\Models\Usuario', 'id', 'comprador_id');

  }

  public function vendedor(){

    return $this->producto->usuario;

  }

}
