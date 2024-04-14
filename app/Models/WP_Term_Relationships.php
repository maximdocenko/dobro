<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP_Term_Relationships extends Model
{
    use HasFactory;
    protected $table = 'wp_term_relationships';
    protected $guarded = [];

    public $timestamps = false;
}
