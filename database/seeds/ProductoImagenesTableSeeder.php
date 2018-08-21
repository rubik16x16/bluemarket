<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Models\Producto;
use App\Models\ProductoImagen;

class ProductoImagenesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    $files= Storage::disk('local')->files('seeder');

    foreach(Producto::all() as $producto){

      for($i= 1; $i<= 3; $i++){

        shuffle($files);
        $fileName= explode('.', $files[0]);
        $newFileName= 'productos/imgs/' . $this->randHash() . ".{$fileName[1]}";

        ProductoImagen::create([
          'src' => $newFileName,
          'producto_id' => $producto->id,
          'orden' => $i
        ]);

        Storage::disk('public')->put($newFileName, Storage::get($files[0]));

      }

    }

  }

  public function randHash($len= 32){

  	return substr(md5(openssl_random_pseudo_bytes(20)),-$len);

  }

}
