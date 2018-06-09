<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'scout_id', 'title', 'text'
    ];

    
}
