<?php

namespace App;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
