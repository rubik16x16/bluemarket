<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model{

  protected $table= 'operaciones';
  protected $fillable= ['comprador_id', 'vendedor_id', 'producto_id', 'cantidad'];

}
