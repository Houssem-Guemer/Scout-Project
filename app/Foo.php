<?php
namespace App;
use Auth;
use App\User;
use App\Message;
use Session;
use DB;


class Foo {
	 public function language_name() {
		return DB::table('languages')->get();
	 } 
	 
	 public function users_activity($param) {
		  $userId = Auth::id();
		  $useragent =  $_SERVER['HTTP_USER_AGENT'];
		  $ipaddress =  $_SERVER['REMOTE_ADDR'];		  
		  $arraydata = array('user_id'=>$userId,'ip_address'=>$ipaddress,'user_agent'=>$useragent );
		  $arraymerge = array_merge($arraydata, $param);
		 DB::table('user_activity')->insert($arraymerge);
	 } 
	 
	 
	  public function settings(){
		  return DB::table('settings')->first();
	 }
	
	
}