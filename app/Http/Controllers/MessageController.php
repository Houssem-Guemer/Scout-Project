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
use App\Message;
use DB;
use Auth;
use Session;
use App\Foo;
use View;


class MessageController extends Controller
{
	
	  /**
     * Display a listing of the __construct.
     *
     * @return \Illuminate\Http\Response
     */
	 protected $foo;
	public function __construct(Foo $foo){		
       $this->middleware('auth');	 
	   $this->foo = $foo;
	   $this->middleware('permission:message.messages');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */	
	public function index(Request $request){
		$searchname = $request->input('search');		
		$userid = Auth::user()->id;		
		$receivemessage = Message::with('receiveMessage')->where('receiver_id',$userid)
		->Where('messages.subject','LIKE', '%'. $searchname.'%')->orderBy('updated_at', 'DSC')->paginate(10);
		
		 $userdata = DB::table('users')->get();
		
		
		 return view('message.message_box',compact('userdata','sendmessage','receivemessage','newMessageCount')); 
	}
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function sendmail(Request $request){
		 $searchname = $request->input('search');
		$userid = Auth::user()->id;
		$sendmessage = Message::with('sendMessage')->where('sender_id',$userid)
		->Where('messages.subject', 'LIKE', '%'. $searchname .'%')
		->orderBy('updated_at', 'DSC')
		->paginate(10);		
		 $userdata = DB::table('users')->get();
		 return view('message.message_box_send',compact('userdata','sendmessage','receivemessage')); 
	}
	
	
	 
	public static function messagecount(){
		  $userId = Auth::id();
		  return DB::table('messages')->where('receiver_id',$userId)->where('status','0')->count();
	 }
	 
	  public static function inboxnewmessage(){
		 $userId = Auth::id();
		return Message::with('receiveMessage')->where('receiver_id',$userId)->where('status',0)->get();
		
	 }
	
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function inboxDetails(Request $request,$id,$replayid){
		
		$userid = Auth::user()->id;
		  $messagedetails = Message::with('receiveMessage')->where('receiver_id',$userid)
		  ->where('id',$id)->get();
		$messagedetailsdata = Message::with('receiveMessage')->where('id',$id)->get();		
		 $replaymessage = Message::with('receiveMessage')
		 ->where('replay_id',$replayid)->where('id','!=',$id)->orderBy('updated_at', 'ASC')->groupBy('id')->get();		
		DB::table('messages')->where('id', $id)->update(array('status' => 1));	
		 return view('message.inbox_details',compact('messagedetails','replaymessage','messagedetailsdata')); 
	}
	
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function sendDetails(Request $request,$id){
		  $messagedata = Message::findOrFail($id);
		  $userid = Auth::user()->id;
		  $messagedetails = Message::with('sendMessage')->where('sender_id',$userid)->where('id',$id)
		->get();
		 return view('message.send_details',compact('messagedetails')); 
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
		 $messageid = $request->input('messageid');
		 $description = $request->input('description');
		if(!empty($input) && !empty($description)){		
		$receiverid = $request->input('receiver_id');
			foreach($receiverid as $view){
				$input['receiver_id'] = $view;
				 Message::create($input);
			}
			/*for user activity */
			$description = array('description'=>'Message send');
			$this->foo->users_activity($description);			
				 return Redirect::back()->with('msg_success', 'Successfully send message!');
			
		}
		
    }
	
	
	 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
	   $input = $request->all();
	   $messageid = $request->input('messageid');
	   if(!empty($messageid)){
	    foreach($messageid as $id){
			$data = Message::findOrFail($id);	
			$data->delete();
			$description = array('description'=>'Message Delete.');
	        $this->foo->users_activity($description);
		}
		return Redirect::back()->with('msg_delete', trans('app.delete_success_message'));
	   }
			
    }

}
