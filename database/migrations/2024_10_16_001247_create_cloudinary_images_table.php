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
        Schema::create('cloudinary_images', function (Blueprint $table) {
            $table->id();
            $table->text('public_id')->nullable();
            $table->text('url');
            $table->text('transformed_url')->nullable();
            $table->string('format')->nullable();
            $table->string('version')->nullable();
            $table->text('data')->nullable();
            $table->json('attributes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('user_ip_hashed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloudinary_images');
    }
};
