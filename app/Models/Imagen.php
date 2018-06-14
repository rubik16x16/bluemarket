<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model{

  protected $table= 'imagenes';
  protected $fillable= ['src', 'producto_id', 'orden'];

}
