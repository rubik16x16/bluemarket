<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class UsuariosTableSeeder extends Seeder{

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    factory(\App\Models\User::class, 20)->create();
  }//end run
}//end UsuariosTableSeeder
