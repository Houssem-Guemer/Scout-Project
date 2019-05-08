<?php

namespace App\Http\Controllers;

use App\landingPageCarousel;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;
use App\Http\Requests;
use App\User;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use App\Foo;
use View;
use File;
use App\Event;
use App\Post;
use App\Scout;
use App\UnitsReport;
use App\Visitor;
use App\Captain;



class DashboardController extends Controller
{

	  /**
     * Display a listing of the __construct.
     *
     * @return \Illuminate\Http\Response
     */
	 private $activities;
	 protected $foo;
	public function __construct(Foo $foo)
	{
       $this->middleware('auth');
	   $this->foo = $foo;
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


	public function index(Request $request){
		if (Auth::user()->hasRole('gov') || Auth::user()->hasRole('Captain') ) {
			/*===============================================
				Retrieve basic information about the website
			================================================*/


			//Total Users
			$totaluser = DB::table('users')->count();

			//Number of new users
			$newuser = DB::table('users')
					  ->where('created_at', '>=', Carbon::now()->startOfMonth())
					  ->count();

			//Number of visitors today
			$todayvisitor = count(DB::table('user_activity')
							->groupBy('ip_address')
							->whereDate('created_at', '=', date('Y-m-d'))
							->get());

			//Number of visitors this month
			$monthvisitor = count(DB::table('user_activity')
						->select([DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS `date`"),])
						->groupBy('ip_address')->groupBy('date')
						->where('created_at', '>=', Carbon::now()->startOfMonth())
						->get());

			//Recently logged in users
			$recentuser = DB::table('users')->select('scout_id')
						->orderBy('scout_id','DESC')
						->limit(5)->get();

			$users = array();
			foreach($recentuser as $userStd){
				$user = User::find($userStd->scout_id);
				array_push($users, $user);
			}

			//Graph
			$graphregister = DB::table('users')
							->select([DB::raw("DATE_FORMAT(created_at, '%Y-%m') AS `date`,DATE_FORMAT(created_at, '%m') AS `month`"),
							DB::raw('COUNT(scout_id) AS count'),])
							->groupBy('date')
							->orderBy('date', 'ASC')
							->get();

			return view('dashboard.dashboard_page',compact('todayvisitor','monthvisitor','totaluser','newuser','users', 'graphregister'));
		}
		return $this->defaultDashboard();
	}

	 private function defaultDashboard(){
		 $id = Auth::id();
         $startDate  =  Carbon::now();
          $endDate =  Carbon::now()->subWeeks(3);
           $endDatetotal =  $startDate->diffInDays($endDate);
			for($x = $endDatetotal; $x>=0; $x--){
			$loopdate = Carbon::now()->subDays($x);
			$stringdate =   $loopdate ->toDateString();
		   $todayvisitor[$x]['datet'] = $stringdate;
		   $todayvisitor[$x]['countdata'] = DB::table('user_activity')->groupBy('ip_address')->where('user_id',$id)->whereDate('created_at', '=', $stringdate)->count();
		}
		return view('dashboard.dashboard_user',compact('todayvisitor'));
    }


    public function insertImage($image){

        if($image==""){
            $filename="";
        }else{
            $expl = explode(',',$image);
            $decode = base64_decode($expl[1]);
            if(str_contains($expl[0],'png')){
                $exte= 'png';

            }else{
                $exte= 'jpeg';
            }

            $filename = 'Carousel_Image'.'-'. date('YmdHis',time()).mt_rand().'.'.$exte;
            $filepath = public_path().'/images/Carousel/'.$filename;


            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function addNewCarouselImage(Request $request){
        $new_images = $request->input('new_images');
        $value="";
        foreach ($new_images as $image){
            if(strpos($image['image'],'Carousel_Image')!== false ){

            }else{
				$file_name = $this->insertImage($image['image']);
				$this->OptimizeImages('/images/Carousel',$file_name);
                $newCarousel_image = new landingPageCarousel;
                $newCarousel_image->image =$file_name;
                $value = $image['description'];
                $newCarousel_image->description = $image['description'];
                $newCarousel_image->save();
            }

        }
        return response()->json(["msg"=>$value]);

    }
    public function deleteCarouselImage($id){
        $landingPageCarousel = landingPageCarousel::find($id);
		$image_name = $landingPageCarousel->image;
		$url = '/images/Carousel';
		if(file_exists(public_path().$url.'/medium/'.$image_name))
		File::delete(public_path().$url.'/medium/'.$image_name);
		if(file_exists(public_path().$url.'/origin/'.$image_name))
		File::delete(public_path().$url.'/origin/'.$image_name);

        File::delete(public_path().'/images/Carousel/'.$image_name);
        $landingPageCarousel->delete();
        return response()->json(["msg"=>"success"]);

    }
    public function Landing_page_images(){
        $landing_page_image = landingPageCarousel::all();
        return response()->json(["landing_page"=>$landing_page_image]);
    }
    public function getNbr_of_Events(){
        $nbr_of_events = Event::count();
        return response()->json(["nbr_of_events"=>$nbr_of_events]);
    }
    public function getNbr_of_Posts(){
        $nbr_of_posts = Post::count();
        return response()->json(["nbr_of_posts"=>$nbr_of_posts]);
    }
    public function getAccount_Nbr(){
        $account_nbr = User::count();
        return response()->json(["account_nbr"=>$account_nbr]);
    }
    public function getHubInfo_forGOv(){
        $nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
        $nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
        $account_nbr = User::count();
        $all_money = DB::table('finances')->select('money_total')->orderBy('id', 'desc')->first();
        if($all_money!=null)
            $all_money = $all_money->money_total;
        else
            $all_money = "00";
        $nbr_of_scouts = Scout::count();
        $all_posts = Post::count();
        $all_events = Event::count();
				  $today_visitors = count(Visitor::where('visit_date',Carbon::now()->format('Y-m-d'))->get());

      return  response()->json(["all_money"=>$all_money,
                          "account_nbr"=>$account_nbr,
                          "nbr_of_events"=>$nbr_of_events,
                          "nbr_of_posts"=>$nbr_of_posts,
                          "nbr_of_scouts"=>$nbr_of_scouts,
                          "all_posts"=>$all_posts,
                          "all_events"=>$all_events,
													  "today_visitors"=>$today_visitors,
                      ]);
    }
    public function getHubInfo_forFin(){
        $all_money = DB::table('finances')->select('money_total')->orderBy('id', 'desc')->first();
        if($all_money!=null)
            $all_money = $all_money->money_total;
        else
            $all_money = "00";

        $fromDate = Carbon::now()->subDay()->startOfWeek()->toDateString();
        $tillDate = Carbon::now()->subDay()->toDateString();
        $this_week_money = DB::table("finances")
            ->select(DB::raw('SUM(transaction_money) as this_week_money'))
            ->whereBetween(DB::raw('date(transaction_date)'),[$fromDate, $tillDate])
            ->get();
        $current_month = Carbon::now()->format('m');
        $this_month_money =DB::table("finances")
            ->select(DB::raw('SUM(transaction_money) as this_month_money'))

            ->whereRaw('MONTH(transaction_date) = ?',[$current_month])

            ->get();
        if($this_month_money == null)
            $this_month_money = "00";
        if($this_week_money == null)
            $this_week_money = "00";
        $nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;


        return  response()->json(["nbr_of_events"=>$nbr_of_events,
                                 "all_money"=>$all_money,
                                 "this_week_money"=>$this_week_money,
                                 "this_month_money"=>$this_month_money]);
    }
    public function getHubInfo_forVgov(){
        $nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
        $nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
        $nbr_of_reports =count(UnitsReport::where(DB::raw('MONTH(month)',Carbon::now()->format('m')))
            ->whereYear('created_at', date('Y'))
            ->get());
        $nbr_of_scouts = Scout::count();
        return  response()->json(["nbr_of_events"=>$nbr_of_events,
                                  "nbr_of_posts"=>$nbr_of_posts,
                                  "nbr_of_reports"=>$nbr_of_reports,
                                  "nbr_of_scouts"=>$nbr_of_scouts]);
    }
	public function	getHubInfo_forSurv(){
		$nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
		$nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
		$nbr_of_reports =count(UnitsReport::where(DB::raw('MONTH(month)',Carbon::now()->format('m')))
				->whereYear('created_at', date('Y'))
				->where('unit','!=','المالية')
				->get());

		return  response()->json(["nbr_of_events"=>$nbr_of_events,
															"nbr_of_posts"=>$nbr_of_posts,
															"nbr_of_reports"=>$nbr_of_reports,
													    ]);
	}
	public function	getHubInfo_forCsd(){
		$nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
		$nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
		return  response()->json(["nbr_of_events"=>$nbr_of_events,
															"nbr_of_posts"=>$nbr_of_posts,

													    ]);
	}
    public function getHubInfo_forMed(){
        $nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
        $nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
        $this_month_visitors= count(Visitor::whereRaw('MONTH(visit_date) = ?',[Carbon::now()->format('m')])->get());
        $this_month_posts =count(Post::whereRaw('MONTH(created_at) = ?',[Carbon::now()->format('m')])->get());
        $today_posts = count(Post::whereBetween('created_at',[date("Y-m-d")." 00:00:00",date("Y-m-d")." 23:59:59"])->get());
        $today_visitors = count(Visitor::where('visit_date',Carbon::now()->format('Y-m-d'))->get());



        Carbon::setWeekStartsAt(Carbon::SATURDAY);
       $this_week_post =count(Post::whereBetween( 'created_at',  [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()] )->get()) ;
        $this_week_visitors=count(Visitor::whereBetween( 'visit_date', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get());





        return  response()->json([  "nbr_of_events"=>$nbr_of_events,
                                    "nbr_of_posts"=>$nbr_of_posts,
                                    "this_month_visitors"=>$this_month_visitors,
                                    "this_month_posts"=>$this_month_posts,
                                    "this_week_post"=>$this_week_post,
                                    "this_week_visitors"=>$this_week_visitors,
                                    "today_posts"=>$today_posts,
                                    "today_visitors"=>$today_visitors,
        ]);
    }
		public function getHubInfo_forUnit(){
			$nbr_of_events = count(Event::where('created_by',Auth::user()->scout_id)->get()) ;
			$nbr_of_posts = count(Post::where('posted_by',Auth::user()->scout_id)->get());
			$my_unit_post = $this->my_unit_post();
			$my_unit_scouts =$this->getnbr_of_scout();
			$unit_fullname = Auth::user()->captain->unit_name->unit_name;
			if(Auth::user()->captain->unit=="cubs"){
				$single = "شبل";

			}
			if(Auth::user()->captain->unit=="sct"){
				$single = "كشاف";
			}
			if(Auth::user()->captain->unit=="asct"){
				$single = "كشاف متقدم";
			}
			if(Auth::user()->captain->unit=="tvlr"){
				$single = "جوال";
			}
         return response()->json([ "nbr_of_events"=>$nbr_of_events,
					                        "nbr_of_posts"=>$nbr_of_posts,
																	"my_unit_post"=>$my_unit_post,
																	"my_unit_scouts"=>$my_unit_scouts,
																	"unit_fullname"=>$unit_fullname,
																	"single"=>$single,
				 ]);
		}
		public function getMyTeam(){
		        $user_unit = Auth::user()->captain->unit;

		        $user_role =Auth::user()->captain->role;
		        if($user_role=="ucap"){
		            $vucp = Scout::find(Captain::where('unit',$user_unit)->where('role','vucp')->value('scout_id'));
                    $vucp_role=[0];
                        $vucp_event_number=[0];
                            $vucp_post_number=[0];
		            if($vucp!=null){
                        $vucp_role = Captain::find($vucp->scout_id)->assignedRole->getRole();
                        $vucp_event_number = DB::table('events')->select(DB::raw('count(event_id) as vucp_event_number'))->where('created_by',$vucp->scout_id)->get();
                        $vucp_post_number = DB::table('posts')->select(DB::raw('count(post_id) as vucp_post_number'))->where('posted_by',$vucp->scout_id)->get();
                    }


		            $capa = Scout::find(Captain::where('unit',$user_unit)->where('role','capa')->value('scout_id'));

                    $capa_role=[];
                        $capa_event_number=[0];
                            $capa_post_number=[0];
                            if($capa!=null){
                                $capa_role = Captain::find($capa->scout_id)->assignedRole->getRole();
                                $capa_event_number = DB::table('events')->select(DB::raw('count(event_id) as capa_event_number'))->where('created_by',$capa->scout_id)->get();
                                $capa_post_number = DB::table('posts')->select(DB::raw('count(post_id) as capa_post_number'))->where('posted_by',$capa->scout_id)->get();
                            }

                                            if(count(Captain::where('unit',$user_unit)->where('role','trne')->get())>1){
                                                $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->get()[0]->scout_id);
                                            }else
		            $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->value('scout_id'));
                    if($trne!=null){
                        $trne_role =  Captain::find($trne->scout_id)->assignedRole->getRole();
                        $trne_event_number = DB::table('events')->select(DB::raw('count(event_id) as trne_event_number'))->where('created_by',$trne->scout_id)->where('approved',true)->get()->first();
                        $trne_post_number = DB::table('posts')->select(DB::raw('count(post_id) as trne_post_number'))->where('posted_by',$trne->scout_id)->where('approved',true)->get()->first();
                    }else{
                        $trne_role = "";
                        $trne_event_number =  "";
                        $trne_post_number = "";
                    }
                   
		            return response()->json(["first"=>[$vucp,$vucp_role,$vucp_event_number[0]->vucp_event_number,$vucp_post_number[0]->vucp_post_number],
		                                     "second"=>[$capa,$capa_role,$capa_event_number[0]->capa_event_number,$capa_post_number[0]->capa_post_number],
		                                     "third"=>[$trne,$trne_role,$trne_event_number,$trne_post_number]]);

		        }
		        if($user_role=="vucp"){
		            $ucap = Scout::find(Captain::where('unit',$user_unit)->where('role','ucap')->value('scout_id'));
		            $ucap_role = Captain::find($ucap->scout_id)->assignedRole->getRole();
		            $ucap_event_number = DB::table('events')->select(DB::raw('count(event_id) as ucap_event_number'))->where('created_by',$ucap->scout_id)->get();
		            $ucap_post_number = DB::table('posts')->select(DB::raw('count(post_id) as ucap_post_number'))->where('posted_by',$ucap->scout_id)->get();

		            $capa = Scout::find(Captain::where('unit',$user_unit)->where('role','capa')->value('scout_id'));
		            $capa_role = Captain::find($capa->scout_id)->assignedRole->getRole();
		            $capa_event_number = DB::table('events')->select(DB::raw('count(event_id) as capa_event_number'))->where('created_by',$capa->scout_id)->get();
		            $capa_post_number = DB::table('posts')->select(DB::raw('count(post_id) as capa_post_number'))->where('posted_by',$capa->scout_id)->get();

                    if(count(Captain::where('unit',$user_unit)->where('role','trne')->get())>1){
                        $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->get()[0]->scout_id);
                    }else
                        $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->value('scout_id'));
                  if($trne!=null){
                    $trne_role = Captain::find($trne->scout_id)->assignedRole->getRole();
		            $trne_event_number = DB::table('events')->select(DB::raw('count(event_id) as trne_event_number'))->where('created_by',$trne->scout_id)->where('approved',true)->get()->first();
		            $trne_post_number = DB::table('posts')->select(DB::raw('count(post_id) as trne_post_number'))->where('posted_by',$trne->scout_id)->where('approved',true)->get()->first();
                  }else{
                    $trne_role = "";
                    $trne_event_number = "";
                    $trne_post_number = "";
                  }
                  
                      

		            return response()->json(["first"=>[$ucap,$ucap_role,$ucap_event_number[0]->ucap_event_number,$ucap_post_number[0]->ucap_post_number],
		                                    "second"=>[$capa,$capa_role,$capa_event_number[0]->capa_event_number,$capa_post_number[0]->capa_post_number],
		                                    "third"=>[$trne,$trne_role,$trne_event_number,$trne_post_number]]);



		        }
		    if($user_role=="capa"){
		        $vucp = Scout::find(Captain::where('unit',$user_unit)->where('role','vucp')->value('scout_id'));
		        $vucp_role = Captain::find($vucp->scout_id)->assignedRole->getRole();
		        $vucp_event_number = DB::table('events')->select(DB::raw('count(event_id) as vucp_event_number'))->where('created_by',$vucp->scout_id)->get();
		        $vucp_post_number = DB::table('posts')->select(DB::raw('count(post_id) as vucp_post_number'))->where('posted_by',$vucp->scout_id)->get();
		        $ucap = Scout::find(Captain::where('unit',$user_unit)->where('role','ucap')->value('scout_id'));
		        $ucap_role = Captain::find($ucap->scout_id)->assignedRole->getRole();
		        $ucap_event_number = DB::table('events')->select(DB::raw('count(event_id) as ucap_event_number'))->where('created_by',$ucap->scout_id)->get();
		        $ucap_post_number = DB::table('posts')->select(DB::raw('count(post_id) as ucap_post_number'))->where('posted_by',$ucap->scout_id)->get();


                if(count(Captain::where('unit',$user_unit)->where('role','trne')->get())>1){
                    $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->get()[0]->scout_id);
                }else
                    $trne = Scout::find(Captain::where('unit',$user_unit)->where('role','trne')->value('scout_id'));
                 if($trne!=null){
                    $trne_role = Captain::find($trne->scout_id)->assignedRole->getRole();
                    $trne_event_number = DB::table('events')->select(DB::raw('count(event_id) as trne_event_number'))->where('created_by',$trne->scout_id)->where('approved',true)->get()->first();
                    $trne_post_number = DB::table('posts')->select(DB::raw('count(post_id) as trne_post_number'))->where('posted_by',$trne->scout_id)->where('approved',true)->get()->first();
                 }else{
                     $trne_role = "";
                     $trne_event_number = "";
                     $trne_post_number = "";
                 }
                    

		        return response()->json(["first"=>[$ucap,$ucap_role,$ucap_event_number[0]->ucap_event_number,$ucap_post_number[0]->ucap_post_number],
		                                 "second"=>[$vucp,$vucp_role,$vucp_event_number[0]->vucp_event_number,$vucp_post_number[0]->ucap_post_number],
		                                 "third"=>[$trne,$trne_role,$trne_event_number,$trne_post_number]]);


		    }
		    if($user_role=="trne"){
		        $vucp = Scout::find(Captain::where('unit',$user_unit)->where('role','vucp')->value('scout_id'));
		        $vucp_role = Captain::find($vucp->scout_id)->assignedRole->getRole();
		        $vucp_event_number = DB::table('events')->select(DB::raw('count(event_id) as vucp_event_number'))->where('created_by',$vucp->scout_id)->get();
		        $vucp_post_number = DB::table('posts')->select(DB::raw('count(post_id) as vucp_post_number'))->where('posted_by',$vucp->scout_id)->get();
		        $ucap = Scout::find(Captain::where('unit',$user_unit)->where('role','ucap')->value('scout_id'));
		        $ucap_role = Captain::find($ucap->scout_id)->assignedRole->getRole();
		        $ucap_event_number = DB::table('events')->select(DB::raw('count(event_id) as ucap_event_number'))->where('created_by',$ucap->scout_id)->get();
		        $ucap_post_number = DB::table('posts')->select(DB::raw('count(post_id) as ucap_post_number'))->where('posted_by',$ucap->scout_id)->get();
		        $capa = Scout::find(Captain::where('unit',$user_unit)->where('role','capa')->value('scout_id'));
		        $capa_role = Captain::find($capa->scout_id)->assignedRole->getRole();
		        $capa_event_number = DB::table('events')->select(DB::raw('count(event_id) as capa_event_number'))->where('created_by',$capa->scout_id)->get();
		        $capa_post_number = DB::table('posts')->select(DB::raw('count(post_id) as capa_post_number'))->where('posted_by',$capa->scout_id)->get();
		        return response()->json(["first"=>[$ucap,$ucap_role,$ucap_event_number[0]->ucap_event_number,$ucap_post_number[0]->ucap_post_number],
		                                "second"=>[$vucp,$vucp_role,$vucp_event_number[0]->vucp_event_number,$vucp_post_number[0]->vucp_post_number],
		                                "third"=>[$capa,$capa_role,$capa_event_number[0]->capa_event_number,$capa_post_number[0]->capa_post_number]]);



		    }
			}
		public function my_unit_post(){
			$user_unit = Auth::user()->captain->unit;

			$myteam = DB::table('scouts')
			          ->select('scout_id')
								->get();
		$myteam_array =[];
		foreach ($myteam as $key ) {
			array_push($myteam_array,$key->scout_id);
			// code...
		}
		array_push($myteam_array,Auth::user()->scout_id);
			$unit_post = DB::table('posts')
		                    ->whereIn('posted_by',$myteam_array)
			                   ->where('approved',0)
												 ->get();
		   $count_unit_post = count($unit_post);
			return $count_unit_post;
		}
		public function getnbr_of_scout(){
			$user_unit = Auth::user()->captain->unit;

			$nbr_of_scout = DB::table('unitscouts')
			                      ->where('unit_id',$user_unit)
														->get();
		  $count_nbr_of_scout = count($nbr_of_scout);
			  return $count_nbr_of_scout ;
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
	
	public function OptimizeImages ($url,$filename){
        if($file_name!=""){
            $realpath = public_path($url);
            if(file_exists($realpath.'/'.$filename)){
                if(!file_exists($realpath.'/origin'))
            mkdir($realpath.'/origin', 0777, true);
        
            if(!file_exists($realpath.'/medium'))
            mkdir($realpath.'/medium', 0777, true);
             
            
        
            copy($realpath.'/'.$filename,$realpath.'/origin/'.$filename);
            $imagesize = round(filesize($realpath.'/origin/'.$filename)/1024/1024); 
        
            if($imagesize<1)
               copy($realpath.'/'.$filename,$realpath.'/medium/'.$filename);
            
            else{
                File::delete($realpath.'/'.$filename);
                list($width, $height, $type, $attr) = getimagesize($realpath.'/origin/'.$filename);
        
                $image_medium = new \Intervention\Image\ImageManager();
                $image_medium->make($realpath.'/origin/'.$filename)->resize($width/2,$height/2)->save($realpath.'/medium/'.$filename);
              
                $image_small = new \Intervention\Image\ImageManager();
                $image_small->make($realpath.'/origin/'.$filename)->resize($width/3,$height/3)->save($realpath.'/'.$filename);
            }  
    
            }
        }
   
      
          
        
    
        }






}
