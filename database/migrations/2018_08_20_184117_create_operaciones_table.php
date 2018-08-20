<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperacionesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('operaciones', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('comprador_id');
      $table->unsignedInteger('vendedor_id');
      $table->unsignedInteger('producto_id');
      $table->foreign('comprador_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('vendedor_id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
      $table->integer('cantidad');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('operaciones');
  }
}
