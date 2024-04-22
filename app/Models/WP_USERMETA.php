<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_USERMETA extends Model
{
    use HasFactory;

    protected $table = 'wp_usermeta';
    protected $guarded = [];

    public $timestamps = false;
}
