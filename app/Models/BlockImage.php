<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockImage extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'content_block_images';
}
