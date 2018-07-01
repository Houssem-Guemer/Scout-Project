<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Validator;
use App\Http\Requests;
use App\Permission;
use App\Role;
use App\Repositories\Role\EloquentRole;
use View;
use App\Foo;

class PermissionController extends Controller
{
	
	
	protected $foo;
	public function __construct(Foo $foo)
	{		
       $this->middleware('auth');	 
	   $this->foo = $foo;
	   $this->middleware('permission:permissions.manage');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$roles = Role::all();
		$permission = Permission::all();
        return view('roles_permission.permissions', compact('roles', 'permission'));
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
			 $validator = Validator::make(['name' => $name],['name' => "required|unique:permissions,name"]);
		  if ($validator->fails()){			
			    return Redirect::back()->with('msg_delete', "Permission already created!");
		  }else{			 
			 Permission::create($input);
			 /*for user activity */
			$description = array('description'=>'Permission Updated');
			$this->foo->users_activity($description);
			 return redirect('permissions')->with('msg_success', trans('app.insert_success_message'));
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
		 $permissiondata = Permission::findOrFail($id);
       return view('roles_permission.permission_edit',compact('permissiondata'));
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
		   $validator = Validator::make(['name' => $name],['name' => "required|unique:permissions,name,{$id}"]);
		  if ($validator->fails()){
		    return Redirect::back()->with('msg_delete', "Permission already exists!");
		  }else{
		   $data = Permission::findOrFail($id);
		     $data->update($input);
			 /*for user activity */
			$description = array('description'=>'Permission Updated');
			$this->foo->users_activity($description);
			return redirect('permissions')->with('msg_update', trans('app.update_success_message'));
	   }
	 }
    }
	
	
	 /**
     * Update permissions for each role.
     *
     * @param Request $request
     * @return mixed
     */
    public function saveRolePermissions(Request $request)
    {	
		
		$roles = $request->get('roles'); 
		$allRoles = DB::table('roles')->pluck('id');	

        foreach ($allRoles as $roleId) {
           $permissions = array_get($roles, $roleId, []);		  
		   $role = Role::find($roleId);
			 if(!empty($roles)){
			 (new EloquentRole)->updatePermissions($roleId, $permissions);
			 }
        }
		
		/*for user activity */
        $description = array('description'=>'Roles wise permission Update');
	    $this->foo->users_activity($description);
		
		return redirect('/dashboard/permissions')->with('msg_update',trans('app.update_success_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Permission::findOrFail($id);		
	  if ($data){ 
		 $data->delete();
		 /*for user activity */
        $description = array('description'=>'Permission Delete.');
	    $this->foo->users_activity($description);
		return redirect('permissions')->with('msg_delete',trans('app.delete_success_message'));
		}
    }
}
