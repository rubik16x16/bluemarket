<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('productos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre', 30);
      $table->integer('existencia');
      $table->double('precio');
      $table->text('descripcion');
      $table->boolean('estado')->default(true);
      $table->unsignedInteger('categoria_id');
      $table->unsignedInteger('user_id');
      $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('productos');
  }
}
