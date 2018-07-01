<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table;
    protected $fillable = ['receiver_id', 'sender_id', 'subject','description','replay_id','replay_ref_id'];
	
	/* send message list */
	public function sendMessage() {
		 return $this->belongsTo('App\User', 'receiver_id');
    }
	/* receive message list */
	public function receiveMessage() {
		 return $this->belongsTo('App\User', 'sender_id');
		 
    }
	
	
	
	
	
	
	
}