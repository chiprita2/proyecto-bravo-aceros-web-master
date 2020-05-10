<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    
     
    public function up()
    {
        Schema::create('products_main', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short', 300)->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('active')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->boolean('active')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_main_id')->unsigned()->nullable();
            $table->foreign('product_main_id')->references('id')->on('products_main');
            $table->integer('sku')->unique()->nullable();
            $table->string('name')->nullable();
            $table->boolean('active')->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->boolean('sale')->nullable();
            $table->integer('price_sale')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('features_products', function (Blueprint $table) {
            $table->bigInteger('feature_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Schema::create('products_main_categories', function (Blueprint $table) {
            $table->bigInteger('product_main_id')->unsigned();
            $table->foreign('product_main_id')->references('id')->on('products_main')->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('products_file', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_main_id')->unsigned();
            $table->foreign('product_main_id')->references('id')->on('products_main')->onDelete('cascade');
            $table->string('file')->nullable();
            $table->timestamps();
        });
        Schema::create('products_image', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_main_id')->unsigned();
            $table->foreign('product_main_id')->references('id')->on('products_main')->onDelete('cascade');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('features_products');
        Schema::dropIfExists('products_file');
        Schema::dropIfExists('products_image');
        Schema::dropIfExists('products_main_categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('features');  
        Schema::dropIfExists('products_main');
    }

   
}
