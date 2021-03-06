<?php

namespace App\Http\Controllers;

use App\Scout;
use App\User;
use App\Captain;
use App\BooksCategory;
use App\BooksLibrary;
use App\Post;
use DB;
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

                    return response()->json(['success' => $success,"unit_image"=>"cubs-logo.png","type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.cubs.unit_name'),"unit_id"=>config('unitAccount.units.cubs.unit_id')]);
                }
                if($email == config('unitAccount.units.scouts.email') && Hash::check($password,config('unitAccount.units.scouts.password'))){

                   $api_token = config('unitAccount.units.scouts.api_token');

                    return response()->json(['success' => $success,"unit_image"=>"scout-logo.png","type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.scouts.unit_name'),"unit_id"=>config('unitAccount.units.scouts.unit_id')]);

                }
                if($email == config('unitAccount.units.advancedscouts.email')  && Hash::check($password,config('unitAccount.units.advancedscouts.password'))){
                    $api_token = config('unitAccount.units.advancedscouts.api_token');
                    return response()->json(['success' => $success,"unit_image"=>"advanced_scout-logo.png","type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.advancedscouts.unit_name'),"unit_id"=>config('unitAccount.units.advancedscouts.unit_id')]);

                }
                if($email == config('unitAccount.units.travelers.email') && Hash::check($password,config('unitAccount.units.travelers.password'))){

                    $api_token = config('unitAccount.units.travelers.api_token');
                    return response()->json(['success' => $success,"unit_image"=>"traveler-logo.png","type"=>"unit",'api_token' =>$api_token,"unit_name"=>config('unitAccount.units.travelers.unit_name'),"unit_id"=>config('unitAccount.units.travelers.unit_id')]);

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
    
    public function getStaff(){
        $captain = Captain::with('isScout')->get();
		return response()->json(["staff"=>$captain]);
    }

    public function getBooks(){
        $books = BooksLibrary::all();
        $categories = BooksCategory::all();
        return response()->json(["categories"=>$categories,"books"=>$books]);
    }
    public function getCategories(){
        $categories = BooksCategory::all();
        return response()->json(["categories"=>$categories]);

    }

    public function getUnitsNews(){
        $books = BooksLibrary::all();
        $captain = Captain::with('isScout')->get();
        $captains_news = Post::with(['post_images','post_creator','is_captain'])->where('linked_unit','cap')->where('approved',true)->get();
        $travelers_news = Post::with(['post_images','post_creator','is_captain'])->where('linked_unit','tvlr')->where('approved',true)->get();
        $asct_news = Post::with(['post_images','post_creator','is_captain'])->where('linked_unit','asct')->where('approved',true)->get();
        $scout_news = Post::with(['post_images','post_creator','is_captain'])->where('linked_unit','sct')->where('approved',true)->get();
        $cubs_news = Post::with(['post_images','post_creator','is_captain'])->where('linked_unit','cubs')->where('approved',true)->get();

      return response()->json(["captain"=>$captains_news,
                                "traveler"=>$travelers_news,
                                "asct"=>$asct_news,
                                "scout"=>$scout_news,
                                "cubs"=>$cubs_news,
                                 "books"=>$books,
                                 "staff"=>$captain]);
    }

    public function getHomePageNews(){
       $posts = Post::with('post_images')->where('approved',true)->orderBy('post_id','desc')->limit(10)->get();
        return response()->json(["posts"=>$posts]);
    }
}
