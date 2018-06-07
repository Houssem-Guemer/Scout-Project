<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'scout_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullName(){
        $result = DB::table('users')
                ->join('scouts', 'scout_id', '=', 'assurance_num')
                ->select('first_name', 'last_name')
                ->where('scout_id', '=', $this->scout_id)->first();
        
        return $result->first_name.' '.$result->last_name;
    }

}   
