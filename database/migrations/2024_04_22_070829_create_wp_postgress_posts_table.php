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
        Schema::create('wp_postgress_posts', function (Blueprint $table) {
            $table->id();
            $table->longText('postgress_id')->nullable();
            $table->longText('published')->nullable();
            $table->longText('title')->nullable();
            $table->longText('preview_img_type')->nullable();
            $table->longText('slug')->nullable();
            $table->longText('type')->nullable();
            $table->longText('lead')->nullable();
            $table->longText('preview_medialib_id')->nullable();
            $table->longText('detail_medialib_id')->nullable();
            $table->longText('meta')->nullable();
            $table->longText('published_at')->nullable();
            $table->longText('start_at')->nullable();
            $table->longText('end_at')->nullable();
            $table->longText('address')->nullable();
            $table->longText('created_at')->nullable();
            $table->longText('updated_at')->nullable();
            $table->longText('origin_title')->nullable();
            $table->longText('origin_url')->nullable();
            $table->longText('federal_level')->nullable();
            $table->longText('lat')->nullable();
            $table->longText('lon')->nullable();
            $table->longText('dobro_id')->nullable();
            $table->longText('dobro_updated_at')->nullable();
            $table->longText('dobro_title')->nullable();
            $table->longText('dobro_slug')->nullable();
            $table->longText('read_time')->nullable();
            $table->longText('meta_image')->nullable();
            $table->longText('old_id')->nullable();
            $table->longText('old')->nullable();
            $table->longText('old_image')->nullable();
            $table->longText('old_author_id')->nullable();
            $table->longText('preview_image')->nullable();
            $table->longText('preview_image_width')->nullable();
            $table->longText('preview_image_height')->nullable();
            $table->longText('preview_image_color')->nullable();
            $table->longText('detail_image')->nullable();
            $table->longText('detail_image_width')->nullable();
            $table->longText('detail_image_height')->nullable();
            $table->longText('detail_image_color')->nullable();
            $table->longText('published_before')->nullable();
            $table->longText('viewed')->nullable();
            $table->longText('fb_reposts')->nullable();
            $table->longText('vk_reposts')->nullable();
            $table->longText('pre_release')->nullable();
            $table->longText('post_status')->nullable();
            $table->longText('body_text')->nullable();
            $table->longText('event_link')->nullable();
            $table->longText('moderation_errors')->nullable();
            $table->longText('like_relations_count')->nullable();
            $table->longText('favorite_relations_count')->nullable();
            $table->longText('delta')->nullable();
            $table->longText('moderation_pass')->nullable();
            $table->longText('pg_search_index')->nullable();
            $table->longText('visible_in_new')->nullable();
            $table->longText('old2')->nullable();
            $table->longText('selection_from')->nullable();
            $table->longText('selection_to')->nullable();
            $table->longText('sorting_date')->nullable();
            $table->longText('old_video')->nullable();
            $table->longText('visible_on_main')->nullable();
            $table->longText('deleted_at')->nullable();
            $table->longText('post1')->nullable();
            $table->longText('post2')->nullable();
            $table->longText('post3')->nullable();
            $table->longText('course_link')->nullable();
            $table->longText('add_to_rss')->nullable();
            $table->longText('org')->nullable();
            $table->longText('org_id')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wp_postgress_posts');
    }
};
