<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostgressPosts extends Model
{
    use HasFactory;

    protected $table = 'wp_postgress_posts';

    protected $guarded = [];

    public $timestamps = false;
}
