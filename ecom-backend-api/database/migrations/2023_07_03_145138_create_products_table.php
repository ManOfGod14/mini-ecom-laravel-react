<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('designation')->unique();
            $table->string('slug')->unique();
            $table->string('resume')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->double('price');
            $table->integer('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('note')->default(0);
            $table->tinyInteger('on_stock')->default(1);
            $table->tinyInteger('on_sale')->default(1);
            $table->tinyInteger('actived')->default(1);
            $table->timestamps();
            $table->softDeletes();
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
};
