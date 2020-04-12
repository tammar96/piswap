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
            $table->integer('borrow_id')->unsigned()->nullable();
            $table->string('book_isbn')->nullable();
        });

        Schema::table('borrowhelpers', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows')->onDelete('cascade');
            $table->foreign('book_isbn')->references('isbn')->on('books')->onDelete('SET NULL');
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
