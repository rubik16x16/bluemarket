<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

use App\Models\ProductoImagen;

class CreateProductoImagenesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('producto_imagenes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('src');
      $table->unsignedInteger('producto_id');
      $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
      $table->integer('orden');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){

    $imgs= ProductoImagen::all()->map(function($producto){
      return 'productos/imgs/' . $producto->src;
    });

    $smImgs= ProductoImagen::all()->map(function($producto){
      return 'productos/imgs/sm/' . $producto->src;
    });

    Storage::disk('public')->delete($imgs->toArray());
    Storage::disk('public')->delete($smImgs->toArray());
    Schema::dropIfExists('producto_imagenes');
  }
}
