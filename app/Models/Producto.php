<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

  protected $table= "productos";
  protected $fillable= ['nombre', 'existencia', 'precio', 'estado', 'descripcion', 'usuario_id', 'categoria_id'];

  public function usuario(){

    return $this->belongsTo('App\Models\Usuario');

  }

  public function imagenes(){

    return $this->hasMany('App\Models\ProductoImagen');

  }

  public function comentarios(){

    return $this->hasMany('App\Models\ProductoComentario');

  }

  public function categoria(){

    return $this->belongsTo('App\Models\Categoria');

  }

}
