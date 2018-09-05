<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $primaryKey = "post_id";
    protected $fillable = ['post_id','posted_by','linked_unit','post_title','location','post_date','description','post_summary','post_type'];
     public function post_creator(){

             return $this->belongsTo('App\Scout','posted_by','scout_id');

     }
}
