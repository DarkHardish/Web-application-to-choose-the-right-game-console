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
        Schema::create('questionsforconsolesspecific', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
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
        Schema::dropIfExists('questionsforconsolesspecific');
    }
};
