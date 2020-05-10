<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->boolean('status')->nullable();
      $table->text('description')->nullable();
      $table->text('info')->nullable();

    });
    Schema::create('zones', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->boolean('status')->nullable();
      $table->integer('price')->nullable();
      $table->timestamps();
    });
    Schema::create('order_status', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->boolean('status')->nullable();
      $table->timestamps();
    });

    Schema::create('order_billing', function (Blueprint $table) {
      $table->id();
      $table->string('razon_social')->nullable();
      $table->string('rut')->nullable();
      $table->string('direccion')->nullable();
      $table->string('comuna')->nullable();
      $table->string('ciudad')->nullable();
      $table->string('region')->nullable();
      $table->string('giro')->nullable();
      $table->timestamps();
    });

    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('id_user')->unsigned()->nullable();
      $table->foreign('id_user')->references('id')->on('users');
      $table->bigInteger('id_order_status')->unsigned()->nullable();
      $table->foreign('id_order_status')->references('id')->on('order_status');
      $table->bigInteger('id_order_billing')->unsigned()->nullable();
      $table->foreign('id_order_billing')->references('id')->on('order_billing');
      $table->bigInteger('id_zone')->unsigned()->nullable();
      $table->foreign('id_zone')->references('id')->on('zones');
      $table->bigInteger('id_payment')->unsigned()->nullable();
      $table->foreign('id_payment')->references('id')->on('payments');
      $table->boolean('method')->nullable();
      $table->string('shipping_name')->nullable();
      $table->string('shipping_address')->nullable();
      $table->text('shipping_info')->nullable();
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->boolean('billing')->nullable();
      $table->integer('phone')->unsigned()->nullable();
      $table->integer('total_pay')->unsigned();
      $table->integer('total_shipping')->unsigned();
      $table->integer('total_discount')->nullable()->unsigned();
      $table->string('code_uniq')->nullable();
      $table->boolean('pay')->nullable();
      $table->float('latitude')->nullable();
      $table->float('longitude')->nullable();
      $table->timestamps();
    });

    Schema::create('order_history', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('id_order_status')->unsigned()->nullable();
      $table->foreign('id_order_status')->references('id')->on('order_status');
      $table->bigInteger('id_order')->unsigned()->nullable();
      $table->foreign('id_order')->references('id')->on('orders');
      $table->text('message')->nullable();
      $table->boolean('notify')->nullable();
      $table->timestamps();
    });

    Schema::create('order_product', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('id_order')->unsigned()->nullable();
      $table->foreign('id_order')->references('id')->on('orders');
      $table->bigInteger('id_product')->unsigned()->nullable();
      $table->foreign('id_product')->references('id')->on('products');
      $table->string('name')->nullable();
      $table->string('value')->nullable();
      $table->string('quantity')->nullable();
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
    Schema::dropIfExists('order_product');
    Schema::dropIfExists('order_history');
    Schema::dropIfExists('orders');
    Schema::dropIfExists('order_status');
    Schema::dropIfExists('order_billing');
    Schema::dropIfExists('payments');
    Schema::dropIfExists('zones');
  }
}
