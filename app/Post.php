<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
<<<<<<< HEAD
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_id', 'title', 'text'
    ];

    
=======
    protected $table = "posts";
    protected $primaryKey = "post_id";
>>>>>>> dashboard-test
}
