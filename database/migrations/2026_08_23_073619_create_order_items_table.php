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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('product_name_en');
            $table->string('product_name_ar');
            $table->string('size_key')->nullable();
            $table->string('label_size_en')->nullable();
            $table->string('label_size_ar')->nullable();
            $table->string('sauce_id')->nullable(); // Store selected sauce IDs as a comma-separated string
            $table->decimal('unit_price', 8, 2);
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
