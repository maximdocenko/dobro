<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleRelations extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'person_relations';
}
