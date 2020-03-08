<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Borrow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Borrow', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->integer('user_id')->unsigned()->nullable();
        });

        Schema::table('Borrow', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('User');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Borrow');
    }
}
