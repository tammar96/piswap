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
        Schema::create('borrowhelpers', function (Blueprint $table) {
            $table->integer('borrow_id')->unsigned();
            $table->string('book_id');
        });

        Schema::table('borrowhelpers', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('book_id')->references('isbn')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowhelpers');
    }
}
