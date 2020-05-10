<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('providers', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->string('rut')->nullable();
      $table->string('email')->unique();
      $table->boolean('active')->nullable();
      $table->timestamps();
    });

    Schema::create('stocks', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('id_store')->unsigned()->nullable();
      $table->foreign('id_store')->references('id')->on('store');
      $table->bigInteger('id_product')->unsigned()->nullable();
      $table->foreign('id_product')->references('id')->on('products');
      $table->integer('saldo')->unsigned();
      $table->timestamps();
    });

    Schema::create('stocks_movement', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('id_stock')->unsigned()->nullable();
      $table->foreign('id_stock')->references('id')->on('stocks');
      $table->bigInteger('id_order')->unsigned()->nullable();
      $table->foreign('id_order')->references('id')->on('orders');
      $table->bigInteger('id_provider')->unsigned()->nullable();
      $table->foreign('id_provider')->references('id')->on('providers');
      $table->integer('saldo')->unsigned()->nullable();
      $table->text('description')->nullable();
      $table->integer('value')->unsigned();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('stocks');
    Schema::dropIfExists('stocks_movement');
    Schema::dropIfExists('providers');
  }
}
