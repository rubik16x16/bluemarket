<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){

    Schema::create('imagenes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('src');
      $table->integer('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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

    Schema::dropIfExists('imagenes');
    
  }
}
