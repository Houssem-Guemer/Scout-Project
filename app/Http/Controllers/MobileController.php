<?php

namespace App\Http\Controllers;

use App\Scout;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MobileController extends Controller
{

    //use this only once
    public function initKeys(){
        $users = User::all();
        foreach ($users as $user){
            $user->api_token = Str::random(60);
            $user->save();
        }
        return response()->json(['success'=>true]);
    }

    //return the api token when logged in
    public function login(Request $request){
        $success = true;
        $api_token = '';
		$user=null;
        $first_name='';
        $last_name='';
        $scout_id='';
        $image='';
        $role='';
        $last_modified = '';
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $api_token = $user->api_token;
			$role = Auth::user()->captain->assignedRole->getRole();
			$user = User::with(["profile","profile"])->where('scout_id',$user->scout_id)->get()->first();
			$first_name = $user->profile->first_name;
            $last_name = $user->profile->last_name;
            $scout_id = $user->scout_id;
            $image = $user->profile->image;
            $last_modified = $user->updated_at;
        }else{
            $success = 'false';
        }
        return response()->json(['success' => $success,'api_token' =>$api_token,"first_name"=>$first_name,"last_name"=>$last_name,"scout_id"=>$scout_id,"image"=>$image,"role"=>$role,"last_modified"=>$last_modified]);
    }

    //return the loged in user
    public function user(Request $request){
        $user = User::where('api_token',$request->input('api_token'))->get()->first();
        $scout = Scout::where('scout_id',$user->scout_id)->get()->first();
        return response()->json(['scout'=>$scout]);
    }
	
	public function getScout()
	{
		$user = Scout::where('scout_id',1)->get();
		return response()->json(["user"=>$user]);
	}
}
