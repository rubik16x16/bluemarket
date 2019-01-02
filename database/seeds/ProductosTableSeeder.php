<?php

use Illuminate\Database\Seeder;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Categoria;

class ProductosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    factory(App\Models\Producto::class, 100)->create();
  }//end run
}//end ProductosTableSeeder class
