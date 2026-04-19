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
            $table->string('customer_name'); 
            $table->string('phone'); 
            $table->text('address');
            $table->decimal('total_amount', 10, 2);
            
            // KPay, Wave, or COD
            $table->string('payment_method')->default('kpay'); 
            
            $table->string('status')->default('pending');
            $table->string('payment_screenshot')->nullable(); // Optional: to store KPay/Wave slip images
            $table->timestamps();
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
