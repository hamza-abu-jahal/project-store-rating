<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 250);
            $table->string('title', 250);
            $table->string('mobile', 13);
            $table->string('path', 250);
            $table->integer('store_category_id')->unsigned();
            $table->float('avarge_rating')->default(0);
            $table->integer('ratings_number')->default(0);
            $table->integer('status')->default(0);
            $table->softDeletes();

            $table->foreign('store_category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_stores');
    }
}
