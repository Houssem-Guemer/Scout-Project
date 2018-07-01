<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use Mail;
use DB;
use Session;
use Excel;
use PDF;
use Auth;
use App\Role;
use App\Message;
use App\Foo;
use View;
use Route;

class UserController extends Controller
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
		if((Route::currentRouteAction() != 'App\Http\Controllers\UserController@profile') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@profileEdit') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@upload')
		&& (Route::currentRouteAction() != 'App\Http\Controllers\UserController@authentication') && (Route::currentRouteAction() != 'App\Http\Controllers\UserController@update')){
			 $this->middleware('permission:users.manage');
		}
    }
	

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
	   $searchname = $request->input('search');
	   $userdata = User::whereRaw("concat(first_name, ' ', last_name) like '%{$searchname}%'")
		->orWhereRaw("concat(last_name, ' ', first_name) like '%{$searchname}%'")
		->orWhere('country', 'LIKE', '%'. $searchname .'%')
			->orWhere('email', 'LIKE', '%'. $searchname .'%')
			->orWhere('username', 'LIKE', '%'. $searchname .'%')
			->orderBy('id', 'DESC')
         ->paginate(20);
        return view('users.user_list',compact('userdata','languages')); 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
		$password = $request->input('password');		
		$input['password'] = bcrypt($password);
		$input['status'] = "Active";
		$user = $request->input('username');
		$email = $request->input('email');
		$role = $request->input('role');
		 $validator = Validator::make($request->all(), [
					'email' => 'required|unique:users|max:255',
					'username' => 'required|unique:users|min:6|max:255',
					'password' => 'required|min:6|max:255',
				]);
			if ($validator->fails()) {
				return redirect('registration')->withErrors($validator)->withInput();      
			}else{
			$savedata = User::create($input);
             
             /* for permission */			 
			 $insertedId = $savedata->id;
			 $roledata = DB::table('roles')->where('name', $role)->get();
			 $roleid = (!empty($roledata)?$roledata[0]->id : '');
			$rolearray = array('user_id'=>$insertedId,'role_id'=>$roleid);
			DB::table('role_user')->insert($rolearray);
			/*for user activity */
			$description = array('description'=>'User Added');
			$this->foo->users_activity($description);
				return Redirect('userlist')->with('msg_success', trans('app.insert_success_message'));
			}
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importuser(Request $request){
			return view('users.import'); 
    }
	
	/**
     * Store a newly created resource in importcsv.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function importcsv(Request $request)
    {
		 $path = $request->file('file');
		 if(empty($path)){
			 return Redirect::back()->with('msg_delete', 'Please choose xls file!');
		 }
		 $extention = $path->getClientOriginalExtension();
		if($extention == 'xls' OR $extention == 'csv'){
		 $data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert['username'] = $value->username;
					$insert['password'] = bcrypt($value->password);
					$insert['email'] = $value->email;
					$insert['first_name'] = $value->first_name;
					$insert['last_name'] = $value->last_name;
					$insert['status'] = $value->status;
					$insert['phone'] = $value->phone;
					$insert['role'] = 'User';
					$insert['gender'] = $value->gender;
					$insert['address'] = $value->address;
					$validator = Validator::make(['username' => $value->username,'email' => $value->email],
							['username' => 'required|unique:users','email' => 'required|email|unique:users'] );
					  if ($validator->fails()){ 
						}else{
						if(!empty($insert)){
						$savedata = User::create($insert);
						 /*Insert role */						
						$insertedId = $savedata->id;						
						$rolearray = array('user_id'=>$insertedId,'role_id'=>2);
						DB::table('role_user')->insert($rolearray);
						/*for user activity */
						$description = array('description'=>'User Added with xls/csv');
						$this->foo->users_activity($description);						
						}
					}
				}
			
				 if(!empty($insert)){
					 return Redirect('userlist')->with('msg_success', 'Successfully xls/csv data insert!');
				
				} 
				
			}
		}else{
			return Redirect::back()->with('msg_delete', 'Please choose xls file!');
			
		}
	}
	
	 /**
     * Store a newly created resource in xlsexport.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function xlsexport(){	
		$users = User::select('first_name','last_name','email', 'username','address','country','phone','gender','date_of_birth','role','status')->orderBy('id', 'DESC')->get();
		Excel::create('users', function($excel) use($users) {
			$excel->sheet('Sheet 1', function($sheet) use($users) {
				$sheet->fromArray($users);
			});
		})->export('xls');
	}
	
	
	
	
	 /**
     * Store a newly created resource in userlistprint.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	public function userlistprint(){	
		$userdata = DB::table('users')->orderBy('id', 'DESC')->get();
		 return view('users.print_userlist',compact('userdata',$userdata)); 
	}
	 /**
     * Store a newly created resource in pdfexport.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	public function pdfexport(){
		$userdata = DB::table('users')->orderBy('id', 'DESC')->get();		  
		$pdf = PDF::loadView('users.userlist_pdf',compact('userdata')); 
		 return $pdf->download();
		
	}	
	
	 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request){
		$country = DB::table('country')->get();
		$roles = DB::table('roles')->get();
       	return view('users.registration',compact('country','roles')); 
	}
	
	public function dummy(Request $request){
		vardump($request);
	}
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$userdata = DB::table('users')->where('id',$id)->first();
		if(empty($userdata)){
			 return redirect('userlist');			
		}
		$useractivity = DB::table('user_activity')->where('user_id',$id)->orderBy('id', 'DESC')->paginate(10);				
		$messagecount = DB::table('messages')->where('receiver_id',$id)->where('status','0')->count();
		$receivemessage = Message::with('receiveMessage')->where('receiver_id',$id)->orderBy('updated_at', 'DSC')->paginate(4);
        return view('users.view_user',compact('userdata','useractivity','receivemessage','messagecount')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
	  $userdata = User::findOrFail($id);
	  $roles = DB::table('roles')->get();
	  $country = DB::table('country')->get();
      return view('users.edit_user',compact('userdata','country','roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$input = $request->all();
       $data = User::findOrFail($id);
		  if ($data){ 		 
			 $data->update($input);
			 $rolename = $request->input('role');
			 if(!empty($rolename)){
				$roledata = DB::table('roles')->where('name',$rolename)->first();			 
				$rolearray = array('role_id'=>$roledata->id);
				$insertrole = array('user_id'=>$id,'role_id'=>$roledata->id);
				$datacount = DB::table('role_user')->where('user_id',$id)->get();
				$data2 = DB::table('role_user')->where('user_id',$id);
				if(count($datacount)>0){					
				$data2->update($rolearray);
				}else{	
					DB::table('role_user')->insert($insertrole);
				}
			 }			
			/*for user activity */
			$description = array('description'=>'User Updated.');
			$this->foo->users_activity($description);			
			 return Redirect::back()->with('msg_update', trans('app.update_success_message'));			
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
		$imagename = $input['image'];
		list($type, $imagename) = explode(';', $imagename);
		list(, $imagename)      = explode(',', $imagename);
		$imagename = base64_decode($imagename);
		$imageNamee = time().'.png';		
		file_put_contents('./uploads/'.$imageNamee, $imagename);
		 if(!empty($imageNamee)){
		 $data = User::findOrFail($id);
		  $data->image = $imageNamee;
		  $data->save();
		  /*for user activity */
        $description = array('description'=>'Change Photo.');
	    $this->foo->users_activity($description);
			return Redirect::back()->with('msg_success', "Image Upload success!");
		}
		return Redirect::back()->with('msg_delete', "Image Upload Failed!");
	  
    }
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request, $id)
    {		
	   $input = $request->all();
	   $user = $request->input('username');
	   $email = $request->input('email');	
	   $password = bcrypt($request->input('password'));
	   if(!empty($password) && !empty($email)){		   
		   $validator = Validator::make(['username' => $user,'email' => $email],
			['username' => "required|unique:users,username,{$id}",'email' => "required|unique:users,email,{$id}"] );
		  if ($validator->fails())
			{ 		
			return Redirect::back()->with('msg_delete', "Email or username already exists!");
			}else{	
				$data = User::findOrFail($id);
				$data->username = $user;
				$data->email = $email;
				$data->password = $password;
			    $data->save();				
			  /*for user activity */
				$description = array('description'=>'User Updated.');
				$this->foo->users_activity($description);					
				return Redirect::back()->with('msg_update', trans('app.update_success_message'));
			}
	   }
	  
		return Redirect::back()->with('msg_delete', "Auth update Failed!");
	  
    }
	
	
	/**
     * Unique users check the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function uniqueuser(Request $request){
		$username = $request->input('uname');
		$user = DB::table('users')->where('username', $username)->get();
		$result = count($user);
		if($result == 0){
		}else{
			echo "Username already exists";
		}			
	}
	
	/**
     * Unique email check the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function uniqueemail(Request $request){
		$email = $request->input('uemail');
		$email = DB::table('users')->where('email', $email)->get();
		$result = count($email);
		if($result == 0){
		}else{
			echo "Email already exists";
		}
			
	}
	
	/**
     * Update ajax users username check the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function uniqueuser_edit(Request $request){
		$username = $request->input('uname');
		$user_id = $request->input('userid');
		$user = DB::table('users')
		->where('username', '=', $username)
		->where('id','!=', $user_id)		
		->get();
		$result = count($user);
		if($result == 0){
		}else{
			echo "Username already exists";
		}			
	}
	
	/**
     * Update ajax users email check the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function uniqueemail_edit(Request $request){
		$email = $request->input('uemail');
		$user_id = $request->input('userid');
		$email = DB::table('users')
		->where('email', '=', $email)
		->where('id','!=', $user_id)
		->get();
		$result = count($email);
		if($result == 0){
		}else{
			echo "Email already exists";
		}
			
	}
	
	

   /**
     * Show the form for Profile the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function profile(Request $request){
		  $id = Auth::id();
		  $userdata = User::findOrFail($id);
		  $roles = DB::table('roles')->get();
		  $country = DB::table('country')->get();
			$useractivity = DB::table('user_activity')->where('user_id',$id)->orderBy('id', 'DESC')->paginate(10);				  
		 $messagecount = DB::table('messages')->where('receiver_id',$id)->where('status','0')->count();
		$receivemessage = Message::with('receiveMessage')->where('receiver_id',$id)->orderBy('updated_at', 'DSC')->paginate(4);
		 return view('users.profile',compact('userdata','country','roles','useractivity','messagecount','receivemessage')); 
	 }
	 
	 
   /**
     * Show the form for Profile the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function profileEdit(Request $request){
		  $id = Auth::id();
		  $userdata = User::findOrFail($id);
		  $roles = DB::table('roles')->get();
		  $country = DB::table('country')->get();      
		 return view('users.edit_profile',compact('userdata','country','roles')); 
	 }
	 
	 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {	
	  $userid = Auth::id();
	 if($id != $userid){
	  $data = User::findOrFail($id);		
	  if ($data){ 
		 $data->delete();		
		/*for user activity */
        $description = array('description'=>'User Delete.');
	    $this->foo->users_activity($description);
		
		return Redirect::back()->with('msg_delete', trans('app.delete_success_message'));
		}	
    }else{
		return Redirect::back()->with('msg_delete', "Loged user don't delete able!");
	}
 }
public static function MyTest($usrid){
	echo $messagedata = DB::table('messages')->where('receiver_id',$usrid)->where('status','0')->count();
	
}
}
