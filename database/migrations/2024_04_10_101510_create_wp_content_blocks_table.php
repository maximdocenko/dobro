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
        Schema::create('wp_content_blocks', function (Blueprint $table) {
            $table->id();
            $table->string("title", 500)->nullable();
            $table->string("kind", 500)->nullable();
            $table->string("position", 500)->nullable();
            $table->string("blockable_type", 500)->nullable();
            $table->string("blockable_id", 500)->nullable();
            $table->longText("content")->nullable();
            $table->string("medialib_id", 500)->nullable();
            $table->string("event_text", 500)->nullable();
            $table->string("image", 500)->nullable();
            $table->string("image_width", 500)->nullable();
            $table->string("image_height", 500)->nullable();
            $table->string("image_color", 500)->nullable();
            $table->string("file", 500)->nullable();
            $table->string("course_text", 500)->nullable();
            $table->string("project_text", 500)->nullable();
            $table->string("support_text", 500)->nullable();
            $table->string("organizer_text", 500)->nullable();
            $table->string("mail_banner", 500)->nullable();
            $table->string("quiz_start_title", 500)->nullable();
            $table->string("quiz_start_text", 500)->nullable();
            $table->string("quiz_start_button", 500)->nullable();
            $table->string("quiz_end_title", 500)->nullable();
            $table->string("quiz_end_text", 500)->nullable();
            $table->string("quiz_end_button", 500)->nullable();
            $table->string("quiz_link", 500)->nullable();
            $table->string("quiz_bg", 500)->nullable();
            $table->string("quiz_show", 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp_content_blocks');
    }
};
