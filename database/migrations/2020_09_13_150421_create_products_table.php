<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->biginteger('userId');
            $table->string('modelno')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('price');
            $table->string('color')->nullable();
            $table->string('material')->nullable();
            $table->string('imgfront')->nullable();
            $table->string('imgback')->nullable();
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('products');
    }
}
