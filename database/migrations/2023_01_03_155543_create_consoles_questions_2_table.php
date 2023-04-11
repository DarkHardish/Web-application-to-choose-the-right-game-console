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
        Schema::create('consoles_questions_2', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nazwa');
            $table->string('image');
            $table->string('opis');
            $table->string('podroze');
            $table->string('price');
            $table->string('VR');
            $table->string('RAM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consoles_questions_2');
    }
};
