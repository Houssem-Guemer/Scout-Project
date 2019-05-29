<?php

namespace App\Http\Controllers;

use App\Scout;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Hash;
class MobileController extends Controller
{
    public function getrandomkey(Request $request){
       
        return response()->json(Str::random(60));
    }

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
        $email = request('email');
        $password = request('password');
		$user=null;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            $api_token = $user->api_token;
			$role = Auth::user()->captain->assignedRole->getRole();
			$user = User::with(["profile","profile"])->where('scout_id',$user->scout_id)->get()->first();
        }else{
            if($email == config('unitAccount.units.cubs.email') ||
            $email == config('unitAccount.units.scouts.email') ||
            $email == config('unitAccount.units.advancedscouts.email') ||
            $email == config('unitAccount.units.travelers.email') 
            ){
               
                if($email == config('unitAccount.units.cubs.email') && Hash::check($password,config('unitAccount.units.cubs.password'))){
                    $api_token = config('unitAccount.units.cubs.api_token');

                    return response()->json(['success' => $success,"type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.cubs.unit_name')]);
                }
                if($email == config('unitAccount.units.scouts.email') && Hash::check($password,config('unitAccount.units.scouts.password'))){

                   $api_token = config('unitAccount.units.scouts.api_token');

                    return response()->json(['success' => $success,"type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.scouts.unit_name')]);

                }
                if($email == config('unitAccount.units.advancedscouts.email')  && Hash::check($password,config('unitAccount.units.advancedscouts.password'))){
                    $api_token = config('unitAccount.units.advancedscouts.api_token');
                    return response()->json(['success' => $success,"type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.advancedscouts.unit_name')]);

                }
                if($email == config('unitAccount.units.travelers.email') && Hash::check($password,config('unitAccount.units.travelers.password'))){

                    $api_token = config('unitAccount.units.travelers.api_token');
                    return response()->json(['success' => $success,"type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.travelers.unit_name')]);

                }
            }else
              
             $success = false;
        }
      return response()->json(['success' => $success,"type"=>"user",'api_token' =>$api_token,"first_name"=>$user->profile->first_name,"last_name"=>$user->profile->last_name,"scout_id"=>$user->scout_id,"image"=>$user->profile->image,"role"=>
$role]);

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
