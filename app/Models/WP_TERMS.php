<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_TERMS extends Model
{
    use HasFactory;

    protected $table = 'wp_terms';
    protected $guarded = [];

    public $timestamps = false;
}
