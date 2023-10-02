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
        Schema::create('lounge_galleries', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->unsignedBigInteger('lounge_id');
            $table->timestamps();

            $table->foreign('lounge_id')->references('id')->on('lounges')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lounge_galleries');
    }
};
