<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Languages;
use File;
use Storage;
use DB;
use Session;
use Validator;
use App;
use View;
use Route;
use App\Foo;


class languageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   protected $foo;
	public function __construct(Foo $foo)
	{	
	$this->middleware('auth');
	   $this->foo = $foo;
	   
	   if(Route::currentRouteAction() != 'App\Http\Controllers\LanguageController@chooser_language'){
		$this->middleware('permission:languages.languages');
	   }
    }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 $language = DB::table('languages')->get();
        return view('language.language',compact('language'));
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
		$rules = array('flag_image' => 'required | mimes:jpeg,jpg,png,PNG,JPEG,JPG | max:3024');
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
            return Redirect::back()
                ->with('msg_delete', "Please choose file jpeg,jpg,png & maximum size 2mb!");
        }    	
		$flag_image = $request->file('flag_image');
		if(!empty($flag_image)){
		 $flag_image  = time() . '.' . $flag_image->getClientOriginalExtension();
		 $request->file('flag_image')->move('./assets/flags/', $flag_image );
		
		}
		 $foldername = $request->input('foldername');	
		 $input['flag_image'] = $flag_image;
		 $countdata = DB::table('languages')->where('foldername', $foldername)->get();	
		  if(count($countdata) > 0){			
			    return Redirect::back()->with('msg_delete', "Language already created!");
		  }else{
		  if(!empty($foldername)){					
			  Languages::create($input);
			  $folder = mkdir(base_path() .'/resources/lang/'.$foldername, 0777, true);
			  File::copy(base_path() .'/resources/lang/en/app.php', base_path() .'/resources/lang/'.$foldername.'/app.php');
			
			/*for user activity */
			$description = array('description'=>'language Added');
			$this->foo->users_activity($description);
			
		  return Redirect::back()->with('msg_success', "Language create success!");
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
     * Display the specified chooser_language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooser_language(Request $request,$id)
    {	
		$language = DB::table('languages')->where('foldername', $id)->first();
		if(!empty($language)){		
		 Session::put('locale_image',$language->flag_image);
		 Session::put('locale_name',$language->languagename);
		 Session::put('locale', $id);
		}		
		 return Redirect::back();
    }
	

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		 $language_data = File::getRequire(base_path()."/resources/lang/{$id}/app.php");
		  $foldername = $id;
		if($id == 'en'){
			return Redirect::back()->with('msg_delete',"This language not editable");
		}
        return view('language.language_edit',compact('language_data','foldername'));
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
	    $data =  $request->all();
		$foldername = $request->input('foldername');
		$languagekey = $request->input('language_key');
		$languageval = $request->input('language_value');
		foreach($languagekey as $key=>$keyvalue){
			$nd[] = '"'.$keyvalue.'"'.' =>'.'"'.$languageval[$key].'",';	
		
		}		
		 File::put( base_path() ."/resources/lang/{$foldername}/app.php","<?php return [ ".implode("\n",$nd)." ];");
        $description = array('description'=>'Language Updated.');
	    $this->foo->users_activity($description);
	return Redirect::back()->with('msg_update', trans('app.update_success_message'));
	   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id,$lan)
    {
		if(!empty($id) && !empty($lan) && ($lan != 'en')){
			
		 $data = Languages::findOrFail($id);
		 if(!empty($data)){
			 $data->delete();
			 File::deleteDirectory(base_path() ."/resources/lang/{$lan}");
			 /*for user activity */
			$description = array('description'=>'Language Delete.');
			$this->foo->users_activity($description);			
			return Redirect::back()->with('msg_delete', trans('app.delete_success_message'));
		 }
		}		
      
    }
	
}