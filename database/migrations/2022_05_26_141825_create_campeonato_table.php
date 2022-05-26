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
        Schema::create('campeonato', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('time_1');
            $table->string('time_2');
            $table->string('time_3');
            $table->string('time_4');
            $table->string('time_5');
            $table->string('time_6');
            $table->string('time_7');
            $table->string('time_8');
            $table->string('vencedor')->nullable();
            $table->string('2_lugar')->nullable();
            $table->string('3_lugar')->nullable();
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
        Schema::dropIfExists('campeonato');
    }
};
