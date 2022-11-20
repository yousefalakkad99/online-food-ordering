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
        Schema::create('daily_meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('day');
            $table->text('description')->nullable();
            $table->decimal('price',8,2);
            $table->string('calories');
            $table->string('image');
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
        Schema::dropIfExists('daily_meals');
    }
};
