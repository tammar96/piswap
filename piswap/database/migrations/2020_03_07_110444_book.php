<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Book', function (Blueprint $table){
            $table->string('isbn')->unique();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->date('date');
            $table->string('bond');
            $table->integer('numberOfPages');
            $table->mediumText('description');
            $table->string('department');
            $table->string('genre');
            $table->integer('rack');
            $table->integer('language');
            /* CATEGORY - I don't think that we need it as a collection, we should use assocation to retrieve categories*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Book');
    }
}
