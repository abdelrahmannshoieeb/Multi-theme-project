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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->decimal('discount', 8, 2)->nullable();
            $table->string('btnText')->nullable();
            $table->string('btnURL')->nullable();
            $table->boolean('isHome')->default(false);
            $table->boolean('isHomeSub')->default(false);
            $table->string('text_dir');
            $table->string('description_color');
            $table->string('title_color');
            $table->string('btn_bg_color');
            $table->string('btn_text_color');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();



            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
