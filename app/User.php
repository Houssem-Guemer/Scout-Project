<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        'scout_id', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getScoutIdAttribute($value){
        return $value;
    }

    public function getEmailAttribute($value){
        return $value;
    }

    /**
     * Get the full name of the user
     * @return String fullname
     */
    public function getFullName(){
        $result = DB::table('users')
                ->join('scouts', 'scout_id', '=', 'assurance_num')
                ->select('first_name', 'last_name')
                ->where('scout_id', '=', $this->scout_id)->first();
        
        return $result->first_name.' '.$result->last_name;
    }

    /**
     * Get the role of the current user
     * @return String Role
     */
    public function getRole(){
        $role = DB::select("SELECT role FROM Users NATURAL JOIN Captains WHERE Users.scout_id = ?", [$this->scout_id]);
            return $role[0]->role;
    }

    /**
     * Get the unit in which this user is active
     * @return String Unit <nullable>
     */
    public function getUnit(){
        $unit = DB::select("SELECT unit FROM Users NATURAL JOIN Captains WHERE Users.scout_id = ?", [$this->scout_id]);
        if(count(unit) > 0)
            return $unit[0]->unit;
        else
            return NULL;
    }

}   
