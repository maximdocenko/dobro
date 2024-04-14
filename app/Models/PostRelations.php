<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRelations extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql';
    protected $table = 'post_relations';
}
