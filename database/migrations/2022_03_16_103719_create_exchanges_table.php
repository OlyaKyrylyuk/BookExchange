<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user1_id')->unsigned()->nullable();
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user2_id')->unsigned()->nullable();
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('book1_id')->unsigned()->nullable();
            $table->foreign('book1_id')->references('id')->on('books')->onDelete('cascade');
            $table->bigInteger('book2_id')->unsigned()->nullable();
            $table->foreign('book2_id')->references('id')->on('books')->onDelete('cascade');
            $table->string('status')->default('');
            $table->boolean('unread')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
