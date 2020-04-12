<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table){
            $table->increments('id');
            $table->dateTime('date');
            $table->string('user_email');
            $table->string('book_isbn')->nullable();
        });

        Schema::table('reservations', function (Blueprint $table){
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
