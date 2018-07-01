<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table;
    protected $fillable = ['app_name', 'app_title', 'app_email','phone','mobile','currency','logo','address','remember_me','forget_password','notify_signup','re_capcha'];
	
	
}