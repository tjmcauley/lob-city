<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_id')->unsigned();
            $table->bigInteger('season');
            $table->bigInteger('games');
            $table->bigInteger('points');
            $table->bigInteger('assists');
            $table->bigInteger('blocks');
            $table->bigInteger('steals');
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
