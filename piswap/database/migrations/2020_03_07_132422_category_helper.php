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
        Schema::create('CategoryHelper', function (Blueprint $table){
            $table->string('book_id');
            $table->integer('category_id')->unsigned();
        });

        Schema::table('CategoryHelper', function (Blueprint $table){
            $table->foreign('book_id')->references('isbn')->on('Book');
            $table->foreign('category_id')->references('id')->on('Category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
