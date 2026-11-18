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
        Schema::create('redeemed_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Foreign key referencing users table
            $table->foreignId('product_id')->constrained(); // Foreign key referencing products table
            $table->string('address')->nullable(); // Address field, nullable
            $table->enum('status', ['pending', 'shipped'])->default('pending'); // Status field with default value 'pending'
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeemed_products');
    }
};
