<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
	protected $table = 'languages';
    protected $fillable = ['foldername', 'languagename', 'description','flag_image'];
}