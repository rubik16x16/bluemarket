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
        $newFileName= $this->randHash() . ".{$fileName[1]}";

        ProductoImagen::create([
          'src' => $newFileName,
          'producto_id' => $producto->id,
          'orden' => $i
        ]);

        $newImg= $this->scale(250, 150, Image::make(Storage::get($files[0])));
      	Storage::disk('public')->put('productos/imgs/sm/' . $newFileName, $newImg->encode($fileName[1])->encoded);
        Storage::disk('public')->put('productos/imgs/' . $newFileName, Storage::get($files[0]));

      }

    }

  }

  public function randHash($len= 32){

  	return substr(md5(openssl_random_pseudo_bytes(20)),-$len);

  }

  public function scale($maxWidth, $maxHeight, Intervention\Image\Image $img){

    $width = $img->width();
		$height= $img->height();

		if($maxWidth > $maxHeight){
			$newHeight= $maxHeight;
			$newWidth= ($maxHeight * $width)/ $height;
			if($width > $height){
				$newWidth= $maxWidth;
				$newHeight= ($maxWidth * $height)/ $width;
			}
		}else{
			$newWidth= $maxWidth;
			$newHeight= ($maxWidth * $height)/ $width;
			if($height > $width){
				$newHeight= $maxHeight;
				$newWidth= ($maxHeight * $width)/ $height;
			}
		}

		return $img->resize($newWidth, $newHeight);

	}

}
