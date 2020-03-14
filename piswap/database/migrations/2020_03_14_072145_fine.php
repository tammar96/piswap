<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->date('date');
            $table->integer('fine')->unsigned();
            $table->integer('state');
            $table->integer('borrow_id')->unsigned();
        });

        Schema::table('fines', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fines');
    }
}
