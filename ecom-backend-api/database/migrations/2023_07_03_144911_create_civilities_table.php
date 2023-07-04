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
        Schema::create('civilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('title', 55);
            $table->char('title_abbr', 5);
            $table->string('sex', 55);
            $table->char('sex_abbr', 5);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('civilities');
    }
};
