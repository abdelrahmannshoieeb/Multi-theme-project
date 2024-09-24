<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->onDelete('set null')
            ->onUpdate('cascade'); 
            
            $table->foreignId('brand_id')
            ->nullable()
            ->constrained('brands')
            ->onDelete('set null')
            ->onUpdate('cascade'); 

            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->text('gallery');
            $table->text('tags');
            $table->enum('status', ['in stock' , 'sold out' ,'coming soon']);
            $table->double('price');
            $table->integer('stars');


            $table->boolean('isFeatured');
            $table->boolean('isBestSelling');
            $table->boolean('isTopRated');
            $table->integer('discount')->default(0);

            
            $table->string('parent_sku')->unique();

            
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
