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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('description_en');
            $table->string('description_ar');
            $table->string('tag_en');
            $table->string('tag_ar');
            $table->string('image');
            $table->decimal('old_price', 8, 2);
            $table->decimal('offer_price', 8, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
