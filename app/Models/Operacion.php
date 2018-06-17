<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model{

  protected $table= 'operaciones';
  protected $fillable= ['comprador_id', 'vendedor_id', 'producto_id', 'cantidad'];

  public function producto(){

    return $this->belongsTo('App\Models\Producto');

  }

  public function total(){

    return $this->producto->precio * $this->cantidad;

  }

}
