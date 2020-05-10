<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('url', 45)->nullable();
            $table->boolean('active')->nullable();
            $table->string('title', 100)->nullable();
            $table->text('seo_description')->nullable();
            $table->string('keywords', 255)->nullable();
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
        Schema::dropIfExists('cms');
    }
}
