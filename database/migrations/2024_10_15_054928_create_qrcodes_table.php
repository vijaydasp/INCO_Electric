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
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->id();
            $table->string('data'); // Store the data for the QR code
            $table->string('image_path'); // Store the path of the generated QR code image
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Nullable foreign key reference to the users table            
            $table->timestamps();       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcodes');
    }
};
