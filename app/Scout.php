<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scout extends Model
{
    protected $table = 'scouts';
    protected $primaryKey = 'assurance_num';

    protected $fillable = [
        'assurance_num', 'first_name', 'last_name', 'date_of_birth', 'place_of_birth',
        'membership_date', 'email', 'phone_number'
    ];

    protected $hidden = [
        'assurance_num'
    ];

    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }
}
