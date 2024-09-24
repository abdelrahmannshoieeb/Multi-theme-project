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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('region_id');
            $table->string('receipt_number')->unique();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('company_name');
            $table->string('country_name');
            $table->string('region_name');
            $table->string('postcode');
            $table->strimg('phone');
            $table->text('address');
            $table->string('email');
            $table->string('notes');
            $table->decimal('delivery_price', 10, 2)->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['Cash', 'Credit Card']);
            $table->enum('payment_status', ['Pending', 'Paid', 'Unpaid', 'Failed', 'Canceled']);
            $table->enum('status', ['Pending', 'Preparing', 'In Queue', 'Ready', 'Dispatched', 'Completed', 'Canceled', 'Failed']);
            $table->enum('claim_type', ['Delivery', 'On Branch']);
            $table->timestamp('claim_at')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            // $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
