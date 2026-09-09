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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'confirmed', 'preparing', 'out_for_delivery', 'delivered', 'cancelled'])->default('pending');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('delivery_fee', 8, 2);
            $table->decimal('total', 8, 2);
            $table->enum('payment_method', ['cash', 'credit_card', 'paypal'])->default('cash');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('governorate');
            $table->string('area');
            $table->string('building_number')->nullable();
            $table->string('notes')->nullable();
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
