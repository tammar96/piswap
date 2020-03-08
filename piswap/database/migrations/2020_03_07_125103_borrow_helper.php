<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrowHelper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BorrowHelper', function (Blueprint $table) {
            $table->integer('borrow_id')->unsigned()->nullable();
            $table->string('book_id')->nullable;
        });

        Schema::table('BorrowHelper', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('Borrow');
            $table->foreign('book_id')->references('isbn')->on('Book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BorrowHelper');
    }
}
