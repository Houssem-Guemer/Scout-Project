<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use DB;
use Session;
use App\Foo;
use View;



class ActivityController extends Controller
{
	
	  /**
     * Display a listing of the __construct.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $foo;
	public function __construct(Foo $foo)
	{		
       $this->middleware('auth');	 
	   $this->foo = $foo;
	  $this->middleware('permission:users.activity');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function index(Request $request){
		 $searchname = $request->input('search');
		$activitydata = DB::table('user_activity')
            ->leftJoin('users', 'users.id', '=', 'user_activity.user_id')
			 ->select('user_activity.*', 'users.phone','users.id','users.first_name','users.last_name','users.email','users.phone','users.username')
			->orderBy('user_activity.id','DES')
			->whereRaw("concat(users.first_name, ' ', users.last_name) like '%{$searchname}%'")			
			->orWhereRaw("concat(users.first_name, ' ', users.last_name) like '%{$searchname}%'")
			 ->orWhere('user_activity.description', 'LIKE', '%'. $searchname .'%')
			 ->orWhere('user_activity.ip_address', 'LIKE', '%'. $searchname .'%')
			 ->orWhere('user_activity.user_agent', 'LIKE', '%'. $searchname .'%')
			 ->orWhere('user_activity.created_at', 'LIKE', '%'. $searchname .'%')
			 ->paginate(25);
		 return view('activity.activity',compact('activitydata')); 
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

	/**
     * Show the form for activity_user of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function activity_user(Request $request,$id){
		 $userdata = User::findOrFail($id);
		$searchname = $request->input('search');		
		$activitydata = DB::table('user_activity')
            ->leftJoin('users','user_activity.user_id', '=','users.id' )
			 ->select('user_activity.*', 'users.phone','users.id','users.first_name','users.last_name','users.email','users.phone','users.username')
			->orderBy('user_activity.id','DES')
			 ->where('user_activity.user_id', '=', $id)			
			 ->where(function($query) use ($searchname){
				$query ->Where('user_activity.description', 'LIKE', '%'. $searchname .'%');
				$query->orWhere('user_activity.ip_address', 'LIKE', '%'. $searchname .'%');
				$query->orWhere('user_activity.user_agent', 'LIKE', '%'. $searchname .'%');
				$query->orWhere('user_activity.created_at', 'LIKE', '%'. $searchname .'%');				
				$query->orWhereRaw("concat(users.first_name, ' ', users.last_name) like '%{$searchname}%'");				
			})
			 ->paginate(25);
		 return view('activity.activity_user',compact('activitydata','userdata')); 
	}

}
