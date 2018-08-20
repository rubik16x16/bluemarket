<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoComentariosTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('producto_comentarios', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('comprador_id');
      $table->unsignedInteger('producto_id');
      $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('comprador_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
      $table->text('comentario');
      $table->text('respuesta')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('producto_comentarios');
  }
}
