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
        Schema::create('daily_data', function (Blueprint $table) {
            $table->id();
            $table->string('morning_set')->nullable();
            $table->string('morning_value')->nullable();
            $table->string('evening_set')->nullable();
            $table->string('evening_value')->nullable();
            $table->string('morning_modern')->nullable();
            $table->string('morning_internet')->nullable();
            $table->string('evening_modern')->nullable();
            $table->string('evening_internet')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_data');
    }
};
