<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeRelations extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'theme_relations';
}
