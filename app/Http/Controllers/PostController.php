<?php

namespace App\Http\Controllers;

use App\Models\AdminRelations;
use App\Models\Admins;
use App\Models\Post;
use App\Models\Block;
use App\Models\BlockImage;
use App\Models\POST_META;
use App\Models\WP_POST;
use App\Models\WP_USERS;
use App\Models\WP_CONTENT_BLOCKS;
use App\Models\WP_CONTENT_BLOCKS_IMAGES;
use App\Models\PostRelations;
use App\Models\RubricRelations;
use App\Models\ThemeRelations;
use App\Models\Theme;
use App\Models\Rubric;
use App\Models\WP_Term_Relationships;
use App\Models\WP_TERMS;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function success() {

        $posts = Post::all();
        foreach($posts as $item) {
            $created_at = date("Y-m-d h:m:s", strtotime($item->created_at));

            $post_status = $item->post_status;
            if($post_status) {
                if($post_status == 'published') {
                    $post_status = 'publish';
                }
            }else{
                $post_status = 'publish';
            }

            $v = WP_POST::create([
                //'ID' => $item->id,
                'post_author' => 1,
                'post_date' => $created_at,
                'post_date_gmt' => $created_at,
                'post_content' => $item->lead ?? '',
                'post_title' => $item->title ?? '',
                'post_excerpt' => '',
                'post_status' => $post_status,
                'comment_status' => 'open',
                'ping_status' => 'publish',
                'post_password' => '',
                'post_name' => substr($item->slug, 0, 199) ?? '',
                'to_ping' => '',
                'pinged' => '',
                'post_modified' => $created_at,
                'post_modified_gmt' => $created_at,
                'post_content_filtered' => '',
                'post_parent' => 0,
                'guid' => '',
                'menu_order' => 0,
                'post_type' => 'post',
                'post_mime_type' => '',
                'comment_count' => 0
            ]);

            $metas = [
                'id',
                'preview_img_type',
                'start_at',
                'end_at',
                'address',
                'origin_url',
                'lat',
                'lon',
                'dobro_id',
                'dobro_updated_at',
                'dobro_title',
                'meta_image',
                'preview_image',
                'detail_image',
                'published_before',
                'body_text',
                'pg_search_index',
                'selection_from',
                'selection_to',
                'sorting_date',
            ];

            foreach ($metas as $meta) {
                POST_META::create([
                    'post_id' => $v->ID,
                    'meta_key' => $meta,
                    'meta_value' => $item->$meta,
                ]);
            }

        }


        return 'success';

    }



    public function _success()
    {
    

        echo "-----------------------------------" . "<br>";

        $data = WP_POST::all();
    
        foreach($data as $item) {
            
            $post_meta = POST_META::where("meta_key", "id")->where("post_id", $item->ID)->first();
            if($post_meta) {

                $terms = RubricRelations::where("rubricable_id", $post_meta->meta_value)->get();
            
                foreach($terms as $term) {

                    if($term) {
                    
                        $category = Rubric::find($term->rubric_id);
                        if($category) {
                        
                            $wp_term = WP_TERMS::where("name", $category->title)->first();
                            //dd($wp_term);
                            if($wp_term) {
                                //dd($wp_term);
                                //*
                                $check = WP_Term_Relationships::where("object_id", $item->ID)->where("term_taxonomy_id", $wp_term->term_id)->get();
                                if(!count($check)) {
                                    WP_Term_Relationships::create([
                                        'object_id' => $item->ID,
                                        'term_taxonomy_id' => $wp_term->term_id,
                                        'term_order' => 0,
                                    ]);
                                }   
                                //*
                                //echo $wp_term->name . " " . $item->post_name . "<br>";
                            }
                        }
                    }

                }

            }


            
        }


        echo "-----------------------------------" . "<br>";

        foreach($data as $item) {
            
            $post_meta = POST_META::where("meta_key", "id")->where("post_id", $item->ID)->first();

            if($post_meta) {

            $terms = ThemeRelations::where("themeable_id", $post_meta->meta_value)->get();
        

           //dd($terms);

            foreach($terms as $term) {

                if($term) {
                
                    $category = Theme::find($term->theme_id);
                    if($category) {
                    
                        $wp_term = WP_TERMS::where("name", $category->title)->first();
                        if($wp_term) {
                            //dd($wp_term);
                            $check = WP_Term_Relationships::where("object_id", $item->ID)->where("term_taxonomy_id", $wp_term->term_id)->get();
                            if(!count($check)) {
                                WP_Term_Relationships::create([
                                    'object_id' => $item->ID,
                                    'term_taxonomy_id' => $wp_term->term_id,
                                    'term_order' => 0,
                                ]);
                            }
                            
                            //echo $wp_term->name . " " . $item->post_name . "<br>";
                        }
                    }
                }

            }

            }


        }
        exit();

        $blocks = BlockImage::all();

        foreach($blocks as $block) {
            WP_CONTENT_BLOCKS_IMAGES::create([
                'image' => $block->image,
                'position' => $block->position,
                'content_block_id' => $block->content_block_id,
                'caption' => $block->caption,
                'credit' => $block->credit,
                'medialib_id' => $block->medialib_id,
                'image_width' => $block->image_width,
                'image_height' => $block->image_height,
                'image_color' => $block->image_color
            ]);
        }

        exit();
        //dd(count($data));
        //$data = Post::skip(50000)->take(50000)->get();
        //$data = Post::skip(140000)->take(20000)->get();
        //$data = Post::skip(160000)->take(20000)->get();
        //$data = Post::skip(180000)->take(20000)->get();
        //$data = Post::skip(200000)->take(20000)->get();
        //$data = Post::skip(220000)->take(20000)->get();
        //$data = Post::skip(240000)->take(20000)->get();
        //$data = Post::skip(260000)->take(20000)->get();
        //$data = Post::skip(280000)->take(20000)->get();
        //$data = Post::skip(300000)->take(20000)->get();
        //$data = Post::skip(320000)->take(20000)->get();
        //$data = Post::skip(340000)->take(20000)->get();
        //345000
        $time = date('Y-m-d', strtotime('2024-04-09'));
        foreach ($data as $item) {

            $v = WP_POST::create([
                //'ID' => $item->id,
                'post_author' => 1,
                'post_date' => $time,
                'post_date_gmt' => $time,
                'post_content' => $item->lead ?? '',
                'post_title' => $item->title ?? '',
                'post_excerpt' => '',
                'post_status' => $item->post_status == 'published' ? 'publish' : $item->post_status,
                'comment_status' => 'open',
                'ping_status' => 'publish',
                'post_password' => '',
                'post_name' => substr($item->slug, 0, 199) ?? '',
                'to_ping' => '',
                'pinged' => '',
                'post_modified' => $time,
                'post_modified_gmt' => $time,
                'post_content_filtered' => '',
                'post_parent' => 0,
                'guid' => '',
                'menu_order' => 0,
                'post_type' => 'post',
                'post_mime_type' => '',
                'comment_count' => 0
            ]);

            $metas = [
                'id',
                'preview_img_type',
                'published_at',
                'start_at',
                'end_at',
                'address',
                'created_at',
                'updated_at',
                'origin_url',
                'lat',
                'lon',
                'dobro_id',
                'dobro_updated_at',
                'dobro_title',
                'meta_image',
                'preview_image',
                'detail_image',
                'published_before',
                'body_text',
                'pg_search_index',
                'selection_from',
                'selection_to',
                'sorting_date',
            ];

            foreach ($metas as $meta) {
                POST_META::create([
                    'post_id' => $v->ID,
                    'meta_key' => $meta,
                    'meta_value' => $item->$meta,
                ]);
            }

        }
    }

    public function images() {

    }

    public function index()
    {
        $data = WP_POST::all();
        dd($data);
    }

    public function view()
    {
        $data = Post::skip(300000)->take(50000)->get();
        foreach ($data as $item) {
            $v = WP_POST::create([
                //'ID' => $item->id,
                'post_author' => 1,
                'post_date' => $item->published_at ?? '2024-04-04 14:00:00',
                'post_date_gmt' => $item->published_at ?? '2024-04-04 14:00:00',
                'post_content' => $item->lead ?? '',
                'post_title' => $item->title ?? '',
                'post_excerpt' => '',
                'post_status' => 'open',
                'comment_status' => 'open',
                'ping_status' => 'publish',
                'post_password' => '',
                'post_name' => substr($item->slug, 0, 199) ?? '',
                'to_ping' => '',
                'pinged' => '',
                'post_modified' => $item->published_at ?? '2024-04-04 14:00:00',
                'post_modified_gmt' => $item->published_at ?? '2024-04-04 14:00:00',
                'post_content_filtered' => '',
                'post_parent' => 0,
                'guid' => '',
                'menu_order' => 0,
                'post_type' => 'post',
                'post_mime_type' => '',
                'comment_count' => 0
            ]);

            POST_META::create([
               'post_id' => $v->id,
               'meta_key' => 'ID',
               'meta_value' => $item->id,
            ]);
        }
    }

    public function admins() {

        $arr = [
        40 => 2,
        41 => 3,
        42 => 4,
        44 => 5,
        45 => 6,
        5  => 7,
        46 => 8,
        6  => 9,
        29 => 10,
        17 => 11,
        31 => 12,
        23 => 13,
        21 => 14,
        24 => 15,
        36 => 16,
        35 => 17,
        37 => 18,
        ];


        $data = Admins::all();
        echo "<div class='w' style='float: left; padding: 10px'>";
        foreach ($data as $item) {
            echo $item->id . " " . $item->ss . "<br>";
        }
        echo "</div>";
        $data = WP_USERS::where("ID", "!=", 1)->get();
        //dd($data);
        echo "<div class='w' style='float: left; padding: 10px'>";
        foreach ($data as $item) {
            echo $item->ID . " " . $item->ss . "<br>";
        }
        echo "</div>";

        $adminR = AdminRelations::whereIn("admin_id", [40,41,42,44,45,5,46,6,29,17,31,23,21,24,36,35,37])->get();
        foreach ($adminR as $admin) {
            $post_meta = POST_META::where("meta_value", $admin->adminable_id)->where("meta_key", "id")->first();

            if($post_meta) {
                //dd($post_meta->post_id);
                if(isset($arr[$admin->admin_id])) {
                    $wp_post = WP_POST::find($post_meta->post_id);
                    $wp_post->post_author = $arr[$admin->admin_id];
                    $wp_post->save();
                }
            }
        }

        exit();

        $data = WP_POST::all();
        foreach ($data as $item) {
            $item->post_author = $arr[0];
        }
    }
}
