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

    $precios= [
      120, 150 , 180, 200, 430, 205,
      750, 340, 480, 660, 990, 30,
    ];

    foreach(Usuario::all() as $usuario){
      foreach (Categoria::all() as $categoria){
        for($i= 1; $i<= 2; $i++){
          shuffle($precios);
          Producto::create([
            'nombre' => "Producto{$i} {$categoria->nombre}",
            'existencia' => 100,
            'precio' => $precios[0],
            'descripcion' => "Descripcion Producto{$i} {$categoria->nombre}",
            'usuario_id' => $usuario->id,
            'categoria_id' => $categoria->id
          ]);
        }
      }
    }

  }
}
