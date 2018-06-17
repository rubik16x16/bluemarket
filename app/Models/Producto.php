<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

  protected $table= "productos";
  protected $fillable= ['nombre', 'existencia', 'precio', 'estado', 'usuario_id'];

  public function usuario(){

    return $this->belongsTo('App\Models\Usuario');

  }

  public function imagenes(){

    return $this->hasMany('App\Models\Imagen');

  }

}
