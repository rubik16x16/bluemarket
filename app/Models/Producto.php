<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{

  protected $table= "productos";
  protected $fillable= ['nombre', 'cantidad', 'precio', 'estado', 'usuario_id'];

  public function usuario(){

    return $this->hasOne('App\Models\Usuario', 'id', 'usuario_id');

  }

}
