<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_CONTENT_BLOCKS extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'wp_content_blocks';
}
