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
        Schema::create('lounge_device_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lounge_id');
            $table->unsignedBigInteger('device_type_id');
            $table->string('price_per_hour');
            $table->timestamps();

            $table->foreign('lounge_id')->references('id')->on('lounges')->onDelete('CASCADE');
            $table->foreign('device_type_id')->references('id')->on('device_types')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lounge_device_types');
    }
};
