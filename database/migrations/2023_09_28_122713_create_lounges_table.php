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
        Schema::create('lounges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('agent_id');
            $table->string('description');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->text('image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lounges');
    }
};
