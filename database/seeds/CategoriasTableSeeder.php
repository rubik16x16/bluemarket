<?php

use Illuminate\Database\Seeder;

use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    $categorias= [
      'Tecnologia', 'Juguetes', 'Herramientas',
       'Libros', 'Joyas', 'inmuebles', 'vehiculos'
     ];

    foreach ($categorias as $categoria) {
      Categoria::create(['nombre' => $categoria]);
    }

  }
}
