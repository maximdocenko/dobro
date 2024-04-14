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
        Schema::create('wp_content_blocks_images', function (Blueprint $table) {
            $table->id();
            $table->string('image', 500)->nullable();
            $table->string('position', 500)->nullable();
            $table->string('content_block_id', 500)->nullable();
            $table->string('caption', 500)->nullable();
            $table->string('credit', 500)->nullable();
            $table->string('medialib_id', 500)->nullable();
            $table->string('image_width', 500)->nullable();
            $table->string('image_height', 500)->nullable();
            $table->string('image_color', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp_content_blocks_images');
    }
};
