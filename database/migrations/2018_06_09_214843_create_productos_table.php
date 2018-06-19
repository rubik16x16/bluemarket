<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
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
      $table->float('precio');
      $table->boolean('estado')->default(true);
      $table->unsignedInteger('usuario_id');
      $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
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
