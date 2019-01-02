<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run(){
    $this->call(UsuariosTableSeeder::class);
    $this->call(CategoriasTableSeeder::class);
    $this->call(ProductosTableSeeder::class);
    // $this->call(ProductoImagenesTableSeeder::class);
  }
}
