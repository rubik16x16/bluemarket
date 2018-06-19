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

  public function comprador(){

    return $this->belongsTo('App\Models\Usuario', 'comprador_id', 'id');

  }

  public function vendedor(){

    return $this->belongsTo('App\Models\Usuario', 'vendedor_id', 'id');

  }

}
