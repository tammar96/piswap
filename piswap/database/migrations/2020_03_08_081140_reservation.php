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
        Schema::create('Reservation', function (Blueprint $table){
            $table->increments('id');
            $table->dateTime('date');
            $table->integer('user_id')->unsigned();
            $table->string('book_id')->nullable();
        });

        Schema::table('Reservation', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('User');
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
        Schema::dropIfExists('Reservation');
    }
}
