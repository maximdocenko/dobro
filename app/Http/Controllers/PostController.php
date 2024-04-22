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
use App\Models\WP_CONTENT_DELTA;
use App\Models\PostRelations;
use App\Models\RubricRelations;
use App\Models\ThemeRelations;
use App\Models\Theme;
use App\Models\Rubric;
use App\Models\WP_Term_Relationships;
use App\Models\WP_TERMS;
use App\Models\WP_USERMETA;
use App\Models\People;
use App\Models\PeopleRelations;
use App\Models\PostgressPosts;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function postgress_posts() {
       // dd(123);
        $data = Post::take(50000)->get();
        // dd(count($data));
        foreach($data as $item) {
            $check = PostgressPosts::where("postgress_id", $item->id)->first();
            if(!$check) {
                PostgressPosts::create([
                    'postgress_id' => $item->id,
                    //'published' => $item->published,
                    //'title' => $item->title,
                    //'preview_img_type' => $item->preview_img_type,
                    //'slug' => $item->slug,
                    'type' => $item->type,
                    //'lead' => $item->lead,
                    //'preview_medialib_id' => $item->preview_medialib_id,
                    //'detail_medialib_id' => $item->detail_medialib_id,
                    //'meta' => $item->meta,
                    'published_at' => $item->published_at,
                    //'start_at' => $item->start_at,
                    //'end_at' => $item->end_at,
                    //'address' => $item->address,
                    //'created_at' => $item->created_at,
                    //'updated_at' => $item->updated_at,
                    //'origin_title' => $item->origin_title,
                    //'origin_url' => $item->origin_url,
                    //'federal_level' => $item->federal_level,
                    //'lat' => $item->lat,
                    //'lon' => $item->lon,
                    //'dobro_id' => $item->dobro_id,
                    //'dobro_updated_at' => $item->dobro_updated_at,
                    //'dobro_title' => $item->dobro_title,
                    //'dobro_slug' => $item->dobro_slug,
                    //'read_time' => $item->read_time,
                    //'meta_image' => $item->meta_image,
                    //'old_id' => $item->old_id,
                    //'old' => $item->old,
                    //'old_image' => $item->old_image,
                    //'old_author_id' => $item->old_author_id,
                    //'preview_image' => $item->preview_image,
                    //'preview_image_width' => $item->preview_image_width,
                    //'preview_image_height' => $item->preview_image_height,
                    //'preview_image_color' => $item->preview_image_color,
                    //'detail_image' => $item->detail_image,
                    //'detail_image_width' => $item->detail_image_width,
                    //'detail_image_height' => $item->detail_image_height,
                    //'detail_image_color' => $item->detail_image_color,
                    //'published_before' => $item->published_before,
                    //'viewed' => $item->viewed,
                    //'fb_reposts' => $item->fb_reposts,
                    //'vk_reposts' => $item->vk_reposts,
                    //'pre_release' => $item->pre_release,
                    //'post_status' => $item->post_status,
                    //'body_text' => $item->body_text,
                    //'event_link' => $item->event_link,
                    //'moderation_errors' => $item->moderation_errors,
                    //'like_relations_count' => $item->like_relations_count,
                    //'favorite_relations_count' => $item->favorite_relations_count,
                    'delta' => $item->delta,
                    //'moderation_pass' => $item->moderation_pass,
                    //'pg_search_index' => $item->pg_search_index,
                    //'visible_in_new' => $item->visible_in_new,
                    //'old2' => $item->old2,
                    //'selection_from' => $item->selection_from,
                    //'selection_to' => $item->selection_to,
                    //'sorting_date' => $item->sorting_date,
                    //'old_video' => $item->old_video,
                    //'visible_on_main' => $item->visible_on_main,
                    //'deleted_at' => $item->deleted_at,
                    //'post1' => $item->post1,
                    //'post2' => $item->post2,
                    //'post3' => $item->post3,
                    //'course_link' => $item->course_link,
                    //'add_to_rss' => $item->add_to_rss,
                    //'org' => $item->org,
                    //'org_id' => $item->org_id,
                ]);
            }
        }
        return 'success';
    }

    public function test() {

        $all = WP_CONTENT_DELTA::all();
        dd(count($all));

        return "success";

       
    }

    public function additional() {
        //  return "!23";
        $post_metas = POST_META::where("meta_key", "id")->get();
       // dd( $post_metas );
        foreach($post_metas as $post_meta) {
            //dd(count($post_metas));
            $post = Post::find($post_meta->meta_value);
            if($post) {
                $check = WP_CONTENT_DELTA::where("post_id", $post_meta->post_id)->first();
                if(!$check) {
                    WP_CONTENT_DELTA::create([
                        'post_id' => $post_meta->post_id,
                        'delta' => $post->delta ? $post->delta : null,
                        'type' => $post->type ? $post->type : null,
                        'published_at' => $post->published_at ? $post->published_at : null,
                    ]);
                }
            }

        }

        return "success";

       
    }

    public function post_types() {
        $data = Post::all();
    }

    public function newusers() {
        $data = WP_USERS::where("id", ">", 18)->get();
        foreach($data as $item) {
            WP_USERMETA::create([
                'user_id' => $item->ID,
                'meta_key' => 'wp_capabilities',
                'meta_value' => 'a:1:{s:10:"subscriber";b:1;}'
            ]);
        }
        return "!@3";
    }


    public function delta() {
        //return "!@";
        $data = Post::where("type", "!=", "Post::Event")->get();
        //dd(count($data));
        //dd($data);
        foreach($data as $item) {
            $post_meta = POST_META::where("meta_key", "id")->where("meta_value", $item->id)->first();
            if($post_meta) {
                $check = WP_CONTENT_DELTA::where("post_id", $post_meta->post_id)->where("key", "post_type")->first();
                if(!$check) {
                //dd($post_meta);
                    WP_CONTENT_DELTA::create([
                        'post_id' => $post_meta->post_id,
                        'key' => 'post_type',
                        'value' => $item->type,
                    ]);
                }
            }
        }
        return "!@3";
    }

    public function people() {

        //$posts = WP_POST::all();



        $data = PeopleRelations::where("personable2_id", ">", 0)->orderBy('id', 'desc')->get();
       // dd(count($data));
/*
        $metas = POST_META::where("meta_key", "id")->get();
        //dd($metas);
    
        foreach($metas as $meta) {
            $pr = PeopleRelations::where("personable2_id", $meta->meta_value)->first();
            if($pr) {
                $user_meta = WP_USERMETA::where("meta_key", "id")->where("meta_value", $pr->person_id)->first();
                if($user_meta) {
                    $post = WP_POST::find($meta->post_id);
                    $post->post_author = $user_meta->user_id;
                    $post->save();
                }
                //echo $user_meta->user_id . " ";
            }
        }

        return "!@3";
*/
        foreach($data as $item) {
            $post_meta = POST_META::where("meta_key", "id")->where("meta_value", $item->personable2_id)->first();
            if($post_meta) {
                $id = $post_meta->post_id;
                
                $user_meta = WP_USERMETA::where("meta_key", "id")->where("meta_value", $item->person_id)->first();
                if($user_meta) {
                    $post = WP_POST::find($id);
                    $post->post_author = $user_meta->user_id;
                }

                $post->save();
            }
        }

        return "!@3";

        //return "!23";
        $data = People::all();

        foreach($data as $item) {
            $user = WP_USERS::create([
                'user_login' => $item->email,
                'user_nicename' => $item->email,
                'user_email' => $item->email,
                'user_pass' => md5("ytrewq11111"),
                'user_registered' => date("Y-m-d h:m:s", strtotime($item->created_at)),
                'display_name' => $item->display_name,
            ]);

            WP_USERMETA::create([
                'user_id' => $user->id,
                'meta_key' => 'image',
                'meta_value' => $item->image,
            ]);

            WP_USERMETA::create([
                'user_id' => $user->id,
                'meta_key' => 'slug',
                'meta_value' => $item->slug,
            ]);

            WP_USERMETA::create([
                'user_id' => $user->id,
                'meta_key' => 'id',
                'meta_value' => $item->id,
            ]);
        }

        return "!23";

        /*
        INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_status`, `display_name`) 
        VALUES ('1000', 'tempuser', MD5('Str0ngPa55!'), 'tempuser', 'support@melapress.com', '0', 'Temp User');
        
        INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) 
        VALUES (NULL, '1000', 'wp_capabilities', 'a:1:{s:13:&amp;amp;amp;amp;quot;administrator&amp;amp;amp;amp;quot;;b:1;}');
        */
    }

    public function success() {

        // content to excerpt
        $p = WP_POST::all();
        foreach($p as $a) {
            //echo str_word_count($a->post_content)."<br>";
            if(str_word_count($a->post_content) < 500) {
                $a->post_excerpt = $a->post_content;
                $a->save();
            }
        }
        exit();

        //return "!@3";
        echo count(WP_POST::all()) . " ";
        dd(count(POST_META::where("meta_key", "id")->get()));

        $posts = Post::all();
        //dd(count($posts));
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

            $q = WP_POST::where("post_name", $item->slug)->where("post_title", $item->title)->first();

            if(!$q) {

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

        }


        return 'success';

    }



    public function _success()
    {
        dd(count(WP_Term_Relationships::all()));
    
        //return "!@3";

        echo "-----------------------------------" . "<br>";

        $data = POST_META::where("meta_key", "id")->get();
    
        foreach($data as $post_meta) {
            
            //$post_meta = POST_META::where("meta_key", "id")->where("post_id", $item->ID)->first();
            //if($post_meta) {

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
                                $check = WP_Term_Relationships::where("object_id", $post_meta->post_id)->where("term_taxonomy_id", $wp_term->term_id)->get();
                                if(!count($check)) {
                                    WP_Term_Relationships::create([
                                        'object_id' => $post_meta->post_id,
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

            //}


            
        }

       // exit();


        echo "-----------------------------------" . "<br>";

        foreach($data as $post_meta) {
               // $item = 1;
            //$post_meta = POST_META::where("meta_key", "id")->where("post_id", $item->ID)->first();

            //if($post_meta) {

                $terms = ThemeRelations::where("themeable_id", $post_meta->meta_value)->get();
            

            //dd($terms);

                foreach($terms as $term) {

                    if($term) {
                    
                        $category = Theme::find($term->theme_id);
                        if($category) {
                        
                            $wp_term = WP_TERMS::where("name", $category->title)->first();
                            if($wp_term) {
                                //dd($wp_term);
                                $check = WP_Term_Relationships::where("object_id", $post_meta->post_id)->where("term_taxonomy_id", $wp_term->term_id)->get();
                                if(!count($check)) {
                                    WP_Term_Relationships::create([
                                        'object_id' => $post_meta->post_id,
                                        'term_taxonomy_id' => $wp_term->term_id,
                                        'term_order' => 0,
                                    ]);
                                }
                                
                                //echo $wp_term->name . " " . $item->post_name . "<br>";
                            }
                        }
                    }

                }

            //}


        }
        exit();

        

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


    public function textblocks() {


        $contents = Block::all();

        foreach($contents as $content) {
            WP_CONTENT_BLOCKS::create([
                'title' => $content->title,
                'kind' => $content->kind,
                'position' => $content->position,
                'blockable_type' => $content->blockable_type,
                'blockable_id' => $content->blockable_id,
                'content' => $content->content,
                'medialib_id' => $content->medialib_id,
                'created_at' => $content->created_at,
                'updated_at' => $content->updated_at,
                'event_text' => $content->event_text,
                'image' => $content->image,
                'image_width' => $content->image_width,
                'image_height' => $content->image_height,
                'image_color' => $content->image_color,
                'file' => $content->file,
                'course_text' => $content->course_text,
                'project_text' => $content->project_text,
                'support_text' => $content->support_text,
                'organizer_text' => $content->organizer_text,
                'mail_banner' => $content->mail_banner,
                'quiz_start_title' => $content->quiz_start_title,
                'quiz_start_text' => $content->quiz_start_text,
                'quiz_start_button' => $content->quiz_start_button,
                'quiz_end_title' => $content->quiz_end_title,
                'quiz_end_text' => $content->quiz_end_text,
                'quiz_end_button' => $content->quiz_end_button,
                'quiz_link' => $content->quiz_link,
                'quiz_bg' => $content->quiz_bg,
                'quiz_show' => $content->quiz_show,
            ]);
        }

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

        return "!@3";
    }
}
