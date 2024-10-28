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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('team_id')->references('id')->on('teams')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
