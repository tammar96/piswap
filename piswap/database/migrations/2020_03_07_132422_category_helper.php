<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryHelper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoryhelpers', function (Blueprint $table){
            $table->string('book_isbn')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
        });

        Schema::table('categoryhelpers', function (Blueprint $table){
            $table->foreign('book_isbn')->references('isbn')->on('books')->onDelete('SET NULL');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryhelpers');
    }
}
