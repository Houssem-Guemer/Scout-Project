<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concerned extends Model
{
    protected $table = "concerned";
    protected $primaryKey =[
        "scouts_id", "activity_id"
    ];
}
