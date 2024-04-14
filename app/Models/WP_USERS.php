<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_USERS extends Model
{
    use HasFactory;
    protected $table = 'wp_users';
    protected $guarded = [];

    public $timestamps = false;
}
