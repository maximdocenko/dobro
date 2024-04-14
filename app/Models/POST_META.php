<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POST_META extends Model
{
    use HasFactory;
    protected $table = 'wp_postmeta';
    protected $guarded = [];

    public $timestamps = false;
}
