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
        Schema::table('banners', function (Blueprint $table) {
            $table->boolean('isActive')->default(true);
        });

        Schema::table('attributes', function (Blueprint $table) {
            $table->boolean('isActive')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { Schema::table('banners', function (Blueprint $table) {
        $table->dropColumn('isActive');
    });

    Schema::table('attributes', function (Blueprint $table) {
        $table->dropColumn('isActive');
    });
    }
};
