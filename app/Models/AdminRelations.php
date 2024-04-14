<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRelations extends Model
{
    use HasFactory;
    protected $table = 'admin_relations';
    protected $connection = 'pgsql';
    protected $guarded = [];
}
