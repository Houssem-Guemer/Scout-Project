<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use App\Role;
use View;
use App\Foo;

class RoleController extends Controller
{
	
	
	protected $foo;
	public function __construct(Foo $foo)
	{		
       $this->middleware('auth');	 
	   $this->foo = $foo;
	   $this->middleware('permission:roles.manage');
	  
    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {		
	   $prefix = DB::getTablePrefix();
       $roles = Role::leftJoin('role_user', 'roles.id', '=', 'role_user.role_id')
            ->select('roles.*', DB::raw("count({$prefix}role_user.user_id) as users_count"))
            ->groupBy('roles.id')
			->paginate(15); 
        return view('roles_permission.roles',compact('roles')); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
       $input = $request->all();
	   $name = $request->input('name');
		 if(!empty($name)){
			 $validator = Validator::make(['name' => $name],['name' => "required|unique:roles,name"]);
		  if ($validator->fails()){			
			    return Redirect::back()->with('msg_delete', "Role already created!");
		  }else{			  
			 Role::create($input);
			 /*for user activity */
			$description = array('description'=>'Role Added');
			$this->foo->users_activity($description);
			 return redirect('roles')->with('msg_success', trans('app.insert_success_message'));
		 }
		}		 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {		
		 $roledata = Role::findOrFail($id);
        return view('roles_permission.roles_edit',compact('roledata'));
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
		$input =  $request->all();
        $name =  $request->input('name');
	    if(!empty($name)){
		   $validator = Validator::make(['name' => $name],['name' => "required|unique:roles,name,{$id}"]);
		  if ($validator->fails()){
		    return Redirect::back()->with('msg_delete', "Role already exists!");
		  }else{
		    $data = Role::findOrFail($id);
			$data->update($input);
			/*for user activity */
			$description = array('description'=>'Role Updated.');
			$this->foo->users_activity($description);
			return redirect('roles')->with('msg_update', trans('app.update_success_message'));
	   }
	   }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::findOrFail($id);		
	  if ($data){ 
		 $data->delete();
		 /*for user activity */
        $description = array('description'=>'Role Delete.');
	    $this->foo->users_activity($description);
		return redirect('roles')->with('msg_delete', trans('app.delete_success_message'));
		}	
    }
}
