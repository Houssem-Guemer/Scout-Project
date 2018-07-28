<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';
    public $timestamps = false;

    public function assignedRole(){
        return $this->hasOne('App\Role', 'name', 'role');
    }

    public function profile(){
        return $this->belongsTo('App\Scout', 'scout_id', 'scout_id');
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
