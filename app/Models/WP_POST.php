<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_POST extends Model
{
    use HasFactory;
    protected $table = 'wp_posts';
    protected $primaryKey = 'ID';
    protected $guarded = [];

    public $timestamps = false;
}
