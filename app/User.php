<?php

namespace App;
<<<<<<< HEAD

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'scout_id';  
=======
use App\Presenters\UserPresenter;
use App\Support\Authorization\AuthorizationUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
	 use AuthorizationUserTrait;
     use Notifiable;
	 protected $presenter = UserPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'scout_id';
    public $timestamps = false;
    

    protected $dates = ['last_login'];
>>>>>>> dashboard-test

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
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
=======
    protected $fillable = ['email', 'password', 'remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function isUnconfirmed()
    {
        return $this->status == UserStatus::UNCONFIRMED;
    }

    public function isActive()
    {
        return $this->status == UserStatus::ACTIVE;
    }

    public function isBanned()
    {
        return $this->status == UserStatus::BANNED;
    }

    /**
     * Gets the captain row corresponding to this user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Captain
     */
    public function captain(){
        return $this->belongsTo('App\Captain', 'scout_id', 'scout_id');
    }

    public function assignRole(Role $role){
        $this->captain()->role = $role;
        return $this;
    }

    /**
     * Gets the unit in which this user is active
     * @return string unit
     */
    public function unit(){
        return $this->captain()->unit;
    }

    /**
     * Gets the basic information of this user
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Scout
     */
    public function profile(){
        return $this->hasOne('App\Scout', 'scout_id', 'scout_id');
    }
}
>>>>>>> dashboard-test
