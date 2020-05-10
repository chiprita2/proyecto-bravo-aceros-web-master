<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('store', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable();
      $table->boolean('active')->nullable();
      $table->timestamps();
    });
    Schema::create('admins', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 100);
      $table->string('email')->unique();
      $table->string('password', 255);
      $table->enum('rol', ['super', 'admin', 'bodega', 'ventas'])->nullable();
      $table->bigInteger('id_store')->unsigned()->nullable();
      $table->foreign('id_store')->references('id')->on('store');
      $table->boolean('status')->nullable();
      $table->rememberToken();
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
    Schema::dropIfExists('admins');
    Schema::dropIfExists('store');
  }
}
