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
            $table->string('user_id');
            $table->string('book_id');
        });

        Schema::table('reservations', function (Blueprint $table){
            $table->foreign('user_id')->references('email')->on('users');
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
        Schema::dropIfExists('reservations');
    }
}
