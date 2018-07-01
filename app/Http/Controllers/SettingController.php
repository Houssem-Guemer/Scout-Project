<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use App\Setting;
use DB;
use Auth;
use Session;
use App\Foo;
use View;



class SettingController extends Controller
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
	   $this->middleware('permission:settings.general');	  
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function index(Request $request){
		$settingdata = DB::table('settings')->get();
		 return view('setting.general_setting',compact('settingdata')); 
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
	public function sidebar()
    {
	  $sidebaractivity = DB::table('user_activity')
		->leftJoin('users', 'users.id', '=', 'user_activity.user_id')
		->orderBy('user_activity.id','DES')->limit(5)->get();
		
		$sidebarusers = DB::table('users')->orderBy('id','DES')->limit(5)->get(); 
		
		$sidebarsettings = DB::table('settings')->first();		 
       return view('setting.sidebar',compact('sidebaractivity','sidebarusers','sidebarsettings')); 
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 $input = $request->all();
		 $settingid = $request->input('settingid');
		 $countdata = DB::table('settings')->groupBy('id')->count();		
		 if(!empty($input)){
			  if($countdata<1){
				 Setting::create($input);
				 return Redirect::back()->with('msg_success', trans('app.insert_success_message'));
			  }else{
				  $data = Setting::findOrFail($settingid);
				  $data->update($input);
				 return Redirect::back()->with('msg_update', trans('app.update_success_message'));
			  }
		 }
		 
	}
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id)
    {	
		$input = $request->all();	
		$rules = array('logo' => 'required | mimes:jpeg,jpg,png,gif | max:5120');
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
            return Redirect::back()
                ->with('msg_delete', "Please choose file jpeg,jpg,png,gif & maximum size 5mb !");
        }		
		$logo = $request->file('logo');
		if(!empty($logo)){
		$filename  = time() . '.' . $logo->getClientOriginalExtension();
		 $request->file('logo')->move('./uploads/', $filename );
		 $data = Setting::findOrFail($id);
		  $data->logo = $filename;
		  $data->save();
		  /*for user activity */
        $description = array('description'=>'User Updated.');
	    $this->foo->users_activity($description);
			return Redirect::back()->with('msg_success', "Image Upload success!");
		}
		return Redirect::back()->with('msg_delete', "Image Upload Failed!");
	  
    }	

}
