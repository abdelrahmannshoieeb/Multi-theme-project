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
        Schema::create('custom_alerts', function (Blueprint $table) {
            $table->id();
            $table->enum('alert_size', ['Small', 'Large']);
            $table->string('image');
            $table->string('link');
            $table->text('text');
            $table->string('background_color');
            $table->string('text_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_alerts');
    }
};
