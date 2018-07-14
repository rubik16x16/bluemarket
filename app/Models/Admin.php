<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{

  protected $table= 'admins';
  protected $fillable= ['nombre', 'email', 'clave'];

  protected $hidden= ['clave'];

}
