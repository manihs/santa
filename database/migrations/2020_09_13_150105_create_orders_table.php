<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('postId')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->biginteger('contact')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip')->nullable();
            $table->string('cardname')->nullable();
            $table->integer('cardnumber')->nullable();
            $table->string('expmonth')->nullable();
            $table->string('expyear')->nullable();
            $table->integer('cvv')->nullable();
            $table->string('sameadr')->nullable();
            $table->integer('qtn')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
