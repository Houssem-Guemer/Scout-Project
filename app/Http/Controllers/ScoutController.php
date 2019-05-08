<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scout;
use App\Captain;
use App\User;
use App\Unit;
use App\UnitScout;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use File;
use PDF;


use App\Http\Requests;

class ScoutController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');

    }
    /**
     * @param Request $request
     * Retrieve All Scouts in Table scouts
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScouts(Request $request){
        $Scout ="";

        /**
         * get All scout of specific unit
         */

            if(Route::currentRouteNamed('cubs')){
                $Scout = UnitScout::with('scout')->where('unit_id','cubs')->get();
            }
            if(Route::currentRouteNamed('scout')){
                $Scout = UnitScout::with('scout')->where('unit_id','sct')->get();
            }
            if(Route::currentRouteNamed('advanced_scouts')){
                $Scout = UnitScout::with('scout')->where('unit_id','asct')->get();
            }
            if(Route::currentRouteNamed('traveler')){
                $Scout = UnitScout::with('scout')->where('unit_id','tvlr')->get();
            }
            if(Route::currentRouteNamed('captain')){
                if(Auth::user()->captain->role=="gov")
                $Scout = Captain::with('isScout')->get();
                else
                    $Scout = Captain::with('isScout')->where('role','!=','gov')->get();
            }


        return response()->json(["Scouts"=>$Scout]);
    }
	
	    public function mgetScouts(Request $request){
        $Scout ="";

        /**
         * get All scout of specific unit
         */

            if(Route::currentRouteNamed('cubs')){
                $Scout = UnitScout::with('scout')->where('unit_id','cubs')->get();
            }
            if(Route::currentRouteNamed('scout')){
                $Scout = UnitScout::with('scout')->where('unit_id','sct')->get();
            }
            if(Route::currentRouteNamed('advanced_scouts')){
                $Scout = UnitScout::with('scout')->where('unit_id','asct')->get();
            }
            if(Route::currentRouteNamed('traveler')){
                $Scout = UnitScout::with('scout')->where('unit_id','tvlr')->get();
            }
            if(Route::currentRouteNamed('captain')){
                if(User::where('api_token',$request->input('api_token'))->get()->first()->captain->role=="gov")
                $Scout = Captain::with('isScout')->get();
                else
                    $Scout = Captain::with('isScout')->where('role','!=','gov')->get();
            }


        return response()->json(["Scouts"=>$Scout]);
    }

    /**
     * @param $id
     * Find and return a specific scout
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScout($id){

        /**
         * get record of a scout
         */
        if(Route::currentRouteNamed('allunits')){
            $Scout = UnitScout::with('scout')->where('scout_id',$id)->get();
        }
        if(Route::currentRouteNamed('getCaptain')){
            $Scout = Scout::find($id);
            $role = Captain::where('scout_id',$id)->value('role');
            $unit = Captain::where('scout_id',$id)->value('unit');
            return response()->json(["Scouts"=>[$Scout,$role,$unit]]);
        }

        return response()->json(["Scouts"=>$Scout]);
    }

    /**
     * @param $request
     * @param $unit_id
     * insert image
     * @return  String (file name)
     */
    public function insertImage( $image,$unit_id){
        $filename="";
        $filepath="";
        if($image=="/images/default.png"){
            $filename="";
        }else{
            $expl = explode(',',$image);
            $decode = base64_decode($expl[1]);
            if(str_contains($expl[0],'png')){
                $exte= 'png';

            }else{
                $exte= 'jpeg';
            }
            $currenttime = Carbon::now()->timestamp;

            switch ($unit_id){
                case 'cubs':{
                    $filename = 'Cubs-'.$currenttime.'.'.$exte;
                    $filepath = public_path().'/images/Cubs/'.$filename;
                    break;
                }
                case 'sct':{
                    $filename = 'Scout-'.$currenttime.'.'.$exte;
                    $filepath = public_path().'/images/Scout/'.$filename;
                    break;
                }
                case 'asct':{
                    $filename = 'AdvancedScout-'.$currenttime.'.'.$exte;
                    $filepath = public_path().'/images/AdvancedScout/'.$filename;
                    break;
                }
                case 'tvlr':{
                    $filename = 'Traveler-'.$currenttime.'.'.$exte;
                    $filepath = public_path().'/images/Traveler/'.$filename;
                    break;
                }
                default:{
                    $filename = 'Captain-'.$currenttime.'.'.$exte;
                    $filepath = public_path().'/images/Captain/'.$filename;
                }
            }

            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
    /**
     * @param Request $request
     * Add new  scout (cub,scout,advance scout,traveler,captain)
     * @return \Illuminate\Http\JsonResponse
     */


    public function AddNewScout(Request $request){
        /**
         * get our unit and make the photo ready to save it in the database
         */
        $scout_email =  $request->input('ScoutInfo.email');
        $role =  $request->input('role');
        $unit_resp = $request->input('unit_resp');
        if($role!="none" && $role!="trne"){
            $role_exist = Captain::where('role',$role)->where('unit',$unit_resp)->get();
            if(count($role_exist)==1){
                return response()->json(["msg"=>"role already exists"]);
            }
        }

        $email_existe = Scout::where('email',$scout_email)->get();
        if($scout_email!="scout@falehscout.com" && count($email_existe)==1){
            return response()->json(["msg"=>"email already exists"]);
        }
        $unit_id = $request->input('scout_unit.unit_id');
        $newimage = $request->input('ScoutInfo.image');
        $filename =  $this->insertImage($newimage,$unit_id);
        switch ($unit_id){
            case 'cubs':{
                $this->OptimizeImages('/images/Cubs',$filename);
               
                break;
            }
            case 'sct':{
                $this->OptimizeImages('/images/Scout',$filename);
              
                break;
            }
            case 'asct':{
                $this->OptimizeImages('/images/AdvancedScout',$filename);
              
                break;
            }
            case 'tvlr':{
                $this->OptimizeImages('/images/Traveler',$filename);
               
                break;
            }
            default:
                $this->OptimizeImages('/images/Captain/',$filename);
               
            
        }

        /**
         * create a new record in the database from a model,
         *  with simply create a  new model instance
         * fill the fields
         *  then  call the save method.
         */
       $scouts = new Scout;
       $unitscouts = new UnitScout;
       $captain = new Captain;


        /**
         * insert our data to the data base then save it
         */
        if($scout_email=="scout@falehscout.com"){
            $max_scout_id = DB::table('scouts')->max('scout_id');
            $scout_email = "scout".($max_scout_id+1)."@falehscout.com";
        }
				 $scout_id = DB::table('scouts')->insertGetId(
					 [
						 'assurance_num'=>(int)$request->input('ScoutInfo.assurance_num'),
						 'first_name'=>$request->input('ScoutInfo.first_name'),
						 'last_name'=>$request->input('ScoutInfo.last_name'),
                         "latin_fname"=> $request->input('ScoutInfo.latin_fname'),
                         "latin_lname"=> $request->input('ScoutInfo.latin_lname'),
						 'date_of_birth'=>$request->input('ScoutInfo.date_of_birth'),
						 'membership_date'=>$request->input('ScoutInfo.membership_date'),
						  'email'=>$scout_email,
						 'phone'=>$request->input('ScoutInfo.phone'),
						 'place_of_birth'=>$request->input('ScoutInfo.place_of_birth'),
						 'family_status'=>$request->input('ScoutInfo.family_status'),
						 'address'=>$request->input('ScoutInfo.address'),
							'image'=>$filename,
					 ]
				 );

  /*     $scouts->assurance_num = (int)$request->input('ScoutInfo.assurance_num');
       $scouts->first_name = $request->input('ScoutInfo.first_name');
       $scouts->last_name = $request->input('ScoutInfo.last_name');
       $scouts->date_of_birth = $request->input('ScoutInfo.date_of_birth');
       $scouts->membership_date = $request->input('ScoutInfo.membership_date');
       $scouts->phone = $request->input('ScoutInfo.phone');

       $scouts->place_of_birth = $request->input('ScoutInfo.place_of_birth');
       $scouts->family_status = $request->input('ScoutInfo.family_status');
       $scouts->address = $request->input('ScoutInfo.address');
       $scouts->image = $filename;
       $scouts->save();*/

        /**
         * get the new record scout_id inserted to add it to the UnitScout table
         */


        //$scout_id = Scout::where('assurance_num','=',(int)$request->input('ScoutInfo.assurance_num'))->select('scout_id')->value('scout_id');


        /**
         * insert the scout to his Unit
         */


       if($unit_id!= 'cap'){
           $unitscouts->scout_id = $scout_id;
           $unitscouts->unit_id = $unit_id;
           $unitscouts->save();

        }else{
           /**
            * insert Captain to his Unit (because table captain Separated from UnitScout table)
            */

           if($request->input('role')!=""){
               $role = $request->input('role');


                   $unit_resp = $request->input('unit_resp');
                   $captain->scout_id = $scout_id;
                   $captain->role = $role;
                   $captain->unit = $unit_resp;
                   $captain->save();


           }


       }


        /**
         * return successfully operation
         */


        return response()->json(["msg" =>"added Successfully"]);
    }

    private function ImageExistance($image){
        if($image==""){
            return false;
        }else{
            return true;
        }
    }
    private  function reaplaceimage($scout,$oldunit,$newunit){
        $image = $scout->image;

        switch ($oldunit){
            case 'cubs':{
                $oldfiledirectory = public_path().'/images/Cubs/'.$image;
                $oldfiledirectory_medium = public_path().'/images/Cubs/medium/'.$image;
                $oldfiledirectory_origin = public_path().'/images/Cubs/origin/'.$image;
                switch ($newunit){
                    case 'sct':{
                        $newfiledirectory = public_path().'/images/Scout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Scout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Scout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'asct':{
                        $newfiledirectory = public_path().'/images/AdvancedScout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/AdvancedScout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/AdvancedScout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'tvlr':{
                        $newfiledirectory = public_path().'/images/Traveler/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Traveler/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Traveler/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    default:{
                        $newfiledirectory = public_path().'/images/Captain/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Captain/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Captain/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                    }
                }
                break;
            }
            case 'sct':{
                $oldfiledirectory = public_path().'/images/Scout/'.$image;
                $oldfiledirectory_medium = public_path().'/images/Scout/medium/'.$image;
                $oldfiledirectory_origin = public_path().'/images/Scout/origin/'.$image;
                switch ($newunit){
                    case 'cubs':{
                        $newfiledirectory = public_path().'/images/Cubs/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Cubs/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Cubs/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'asct':{
                        $newfiledirectory = public_path().'/images/AdvancedScout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/AdvancedScout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/AdvancedScout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'tvlr':{
                        $newfiledirectory = public_path().'/images/Traveler/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Traveler/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Traveler/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    default:{
                        $newfiledirectory = public_path().'/images/Captain/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Captain/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Captain/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                    }
                }
                break;
            }
            case 'asct':{
                $oldfiledirectory = public_path().'/images/AdvancedScout/'.$image;
                $oldfiledirectory_medium = public_path().'/images/AdvancedScout/medium/'.$image;
                $oldfiledirectory_origin = public_path().'/images/AdvancedScout/origin/'.$image;
                switch ($newunit){
                    case 'cubs':{
                        $newfiledirectory = public_path().'/images/Cubs/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Cubs/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Cubs/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'sct':{
                        $newfiledirectory = public_path().'/images/Scout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Scout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Scout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'tvlr':{
                        $newfiledirectory = public_path().'/images/Traveler/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Traveler/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Traveler/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    default:{
                        $newfiledirectory = public_path().'/images/Captain/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Captain/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Captain/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                    }
                }
                break;
            }
            case 'tvlr':{
                $oldfiledirectory = public_path().'/images/Traveler/'.$image;
                $oldfiledirectory_medium = public_path().'/images/Traveler/medium/'.$image;
                $oldfiledirectory_origin = public_path().'/images/Traveler/origin/'.$image;
                switch ($newunit){
                    case 'cubs':{
                        $newfiledirectory = public_path().'/images/Cubs/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Cubs/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Cubs/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'sct':{
                        $newfiledirectory = public_path().'/images/Scout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Scout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Scout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    case 'asct':{
                        $newfiledirectory = public_path().'/images/AdvancedScout/'.$image;
                        $newfiledirectory_medium = public_path().'/images/AdvancedScout/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/AdvancedScout/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                        break;
                    }
                    default:{
                        $newfiledirectory = public_path().'/images/Captain/'.$image;
                        $newfiledirectory_medium = public_path().'/images/Captain/medium/'.$image;
                        $newfiledirectory_origin = public_path().'/images/Captain/origin/'.$image;
                        copy($oldfiledirectory, $newfiledirectory);
                        copy($oldfiledirectory_medium, $newfiledirectory_medium);
                        copy($oldfiledirectory_origin, $newfiledirectory_origin);
                        File::delete($oldfiledirectory);
                        File::delete($oldfiledirectory_medium);
                        File::delete($oldfiledirectory_origin);
                    }
                }
                break;
            }
            default:{
                $oldfile = public_path().'/images/Captain/'.$image;
                $oldfile_medium = public_path().'/images/Captain/medium/'.$image;
                $oldfile_origin = public_path().'/images/Captain/origin/'.$image;
                File::delete($oldfile);
                File::delete($oldfile_medium);
                File::delete($oldfile_origin);

            }
        }











    }
    private function deleteimageFromDirecotry($scout,$unit){
        $imagename = $scout->image;
        switch ($unit){
            case 'cubs':{

                $url = '/images/Cubs';
                if(file_exists(public_path().$url.'/medium/'.$image_name))
                File::delete(public_path().$url.'/medium/'.$image_name);
                if(file_exists(public_path().$url.'/origin/'.$image_name));
                File::delete(public_path().$url.'/origin/'.$image_name);

                $deletedimage = public_path().'/images/Cubs/'.$imagename;
            break;
        }
            case 'sct':{
                $url = '/images/Scout';
                if(file_exists(public_path().$url.'/medium/'.$image_name))
                File::delete(public_path().$url.'/medium/'.$image_name);
                if(file_exists(public_path().$url.'/origin/'.$image_name));
                File::delete(public_path().$url.'/origin/'.$image_name);

                $deletedimage = public_path().'/images/Scout/'.$imagename;
                break;
            }
            case 'asct':{
                $url = '/images/AdvancedScout';
                if(file_exists(public_path().$url.'/medium/'.$image_name))
                File::delete(public_path().$url.'/medium/'.$image_name);
                if(file_exists(public_path().$url.'/origin/'.$image_name));
                File::delete(public_path().$url.'/origin/'.$image_name);

                $deletedimage = public_path().'/images/AdvancedScout/'.$imagename;
                break;
            }
            case 'tvlr':{
                $url = '/images/Traveler';
                if(file_exists(public_path().$url.'/medium/'.$image_name))
                File::delete(public_path().$url.'/medium/'.$image_name);
                if(file_exists(public_path().$url.'/origin/'.$image_name));
                File::delete(public_path().$url.'/origin/'.$image_name);

                $deletedimage = public_path().'/images/Traveler/'.$imagename;
                break;
            }
            default:{
                $url = '/images/Captain';
                if(file_exists(public_path().$url.'/medium/'.$image_name))
                File::delete(public_path().$url.'/medium/'.$image_name);
                if(file_exists(public_path().$url.'/origin/'.$image_name));
                File::delete(public_path().$url.'/origin/'.$image_name);
                $deletedimage = public_path().'/images/Captain/'.$imagename;
                break;
            }
        }
        File::delete($deletedimage);

        return $deletedimage;
    }

    /**
     * @param Request $request
     * @param $id
     * Edit information for specific scout
     * @return \Illuminate\Http\JsonResponse
     */
  public function  EditScoutInfo(Request $request,$scout_id){
      $email = $request->input('ScoutInfo.email');
      if(Scout::where('email',$email)->where('scout_id','!=',$scout_id)->exists())
          return  response()->json(["msg" => "email"]);
      $newunit = $request->input('scout_unit.unit_id');
      $role = $request->input('role');
      if($role!="ucap" && $role!="vucp" && $role!="ucap" && $role!="capa"){
          if(Captain::where('role',$role)->where('scout_id','!=',$scout_id)->exists())
              return  response()->json(["msg" => "role"]);
      }else{
          if(Captain::where('role',$role)->where('unit',$newunit)->where('scout_id','!=',$scout_id)->exists())
              return  response()->json(["msg" => "role"]);

      }

      $unitscout= UnitScout::where('scout_id', '=',$scout_id);
      if($unitscout->value('scout_id')==null){
          $role = $request->input('role');
          $role_exist = Captain::where('role',$role)->get();

      }

      /**
       * find and get record of the scout who want to update his information
       */
        $scout = Scout::find($scout_id);


     $scout_image = $request->input('ScoutInfo.image');
     $user = User::find($scout_id);



      $oldunit= UnitScout::where('scout_id', '=',$scout_id)->value('unit_id');

      $scoutunit = UnitScout::with('scout')->where('scout_id',$scout_id)->get();



      $captain = Captain::where('scout_id','=',$scout_id);
      /**
       * if he doesn't exist
       */
             if(!$scout){
                 return response()->json(["msg" => "doesn't exist"]);
             }
           /**
            * update the data and save it to database
            */

           $scout->assurance_num = $request->input('ScoutInfo.assurance_num');
           $scout->first_name= $request->input('ScoutInfo.first_name');
           $scout->last_name= $request->input('ScoutInfo.last_name');
           $scout->latin_fname= $request->input('ScoutInfo.latin_fname');
           $scout->latin_lname= $request->input('ScoutInfo.latin_lname');
           $scout->date_of_birth= $request->input('ScoutInfo.date_of_birth');
           $scout->membership_date= $request->input('ScoutInfo.membership_date');
           $scout->phone = $request->input('ScoutInfo.phone');
           $scout->email = $request->input('ScoutInfo.email');
           $scout->place_of_birth = $request->input('ScoutInfo.place_of_birth');
           $scout->family_status = $request->input('ScoutInfo.family_status');
           $scout->address = $request->input('ScoutInfo.address');

           if($user!=null){
               $user->email = $request->input('ScoutInfo.email');
               $user->save();
           }
      $role = $request->input('role');
      $unit_resp = $request->input('unit_resp');
     if($unitscout->value('scout_id')==null){
         // captain
         if($role!="trne" && $role!="none")
             $role_exist = Captain::where('role',$role)->where('unit',$unit_resp)->get();

         else   $role_exist=[];



         if(count($role_exist)==1){
             $old_captain_id = $role_exist[0]->scout_id;
             $old_captain_role_owner = $role_exist[0]->role;
             $old_captain_unit = $role_exist[0]->unit;
             if($old_captain_id == $scout_id){

                 $captain->update(['role' =>$role ,'unit'=>$unit_resp]);
             }else{



                 $old_captain = Captain::find($old_captain_id);

                 $current_captain = Captain::find($scout_id);
                 $current_captain_old_role = $current_captain->role;
                 $current_captain_old_unit = $current_captain->unit;

                 $old_captain->update(['role'=>$current_captain_old_role,'unit'=>$current_captain_old_unit]);
                 $current_captain->update(['role'=>$role,'unit'=>$unit_resp]);
             }



         }else{
             $captain->update(['role' =>$role ,'unit'=>$unit_resp]);
         }

         if(str_contains($request->input('ScoutInfo.image'), '.png') | str_contains($request->input('ScoutInfo.image'), '.jpeg') ){
             // he's a captain and he want to keep his image

             if($this->ImageExistance($scout->image)){
                 // image exist in db and he want to keep it

             }else{

                 // if he don't have an image

             }
         }else{
             if($request->input('ScoutInfo.image')==""){

             }else{


             // he's a captain and he want to change his image
             if($this->ImageExistance($scout->image)){
                 // he's a captain and he have an image

                 // first delete image from directory
                 $imageold =  $this->deleteimageFromDirecotry($scout,'cap');

                 // then insert new image (DB+File)
                 $filename =  $this->insertImage($request->input('ScoutInfo.image'),'cap');
                 $this->OptimizeImages('/images/Captain',$filename);
                  $scout->image =$filename;

             }else{

                 // he's a captain and he want to change image and he don't have one yet
                 $filename =  $this->insertImage($request->input('ScoutInfo.image'),'cap');
                 $this->OptimizeImages('/images/Captain',$filename);

                 $scout->image =$filename;
             }
         }
         }

     } else{
         // he's a cub | scout | advancedscout |traveler

         $oldunit =  UnitScout::where('scout_id', '=',$scout_id)->value('unit_id');
         if ($oldunit==$newunit){
             // so he staying in his unit
             if($request->input('ScoutInfo.image')==""){


             }else{
                 if(str_contains($request->input('ScoutInfo.image'), '.png') | str_contains($request->input('ScoutInfo.image'), '.jpeg')){
                     // so he doesn't want to to change his image


                 }else{
                     // he want to change his image
                     if($request->input('ScoutInfo.image')==""){
                         // he don't have a picture (so it's his first time)

                     }else{
                         // he want to change and he have a one before

                         // we need to delete  the old one and create a new one
                         $imageold =  $this->deleteimageFromDirecotry($scout,$oldunit);
                         $filename =  $this->insertImage($request->input('ScoutInfo.image'),$oldunit);
                         switch ($oldunit){
                            case 'cubs':{
                                $this->OptimizeImages('/images/Cubs',$filename);
                               
                                break;
                            }
                            case 'sct':{
                                $this->OptimizeImages('/images/Scout',$filename);
                              
                                break;
                            }
                            case 'asct':{
                                $this->OptimizeImages('/images/AdvancedScout',$filename);
                              
                                break;
                            }
                            case 'tvlr':{
                                $this->OptimizeImages('/images/Traveler',$filename);
                               
                                break;
                            }
                            default:
                                $this->OptimizeImages('/images/Captain/',$filename);
                               
                            
                        }
                         $scout->image = $filename;
                     }
                 }
             }



         }else{
             // so his unit is changed it

             if((str_contains($request->input('ScoutInfo.image'), '.png') || str_contains($request->input('ScoutInfo.image'), '.jpeg')  ) && (!str_contains($request->input('ScoutInfo.image'),'/images/default.png'))){
                 // he don't want to change his picture
                 // but we need to replace his image to his new unit

                 $this->reaplaceimage($scout,$oldunit,$newunit);

             }else{
                 if($scout_image == '/images/default.png'){


                 }else{

                     // he want to change his picture

                     // first delete the old picture
                     $this->deleteimageFromDirecotry($scout,$oldunit);

                     // insert new picture in the new unit
                     $image = $this->insertImage($request->input('ScoutInfo.image'),$newunit);
                     switch ($newunit){
                        case 'cubs':{
                            $this->OptimizeImages('/images/Cubs',$image);
                           
                            break;
                        }
                        case 'sct':{
                            $this->OptimizeImages('/images/Scout',$image);
                          
                            break;
                        }
                        case 'asct':{
                            $this->OptimizeImages('/images/AdvancedScout',$image);
                          
                            break;
                        }
                        case 'tvlr':{
                            $this->OptimizeImages('/images/Traveler',$image);
                           
                            break;
                        }
                        default:
                            $this->OptimizeImages('/images/Captain/',$image);
                           
                        
                    }
                     
                     $scout->image = $image;
                 }


             }

         }


     }
         $scout->save();

           if($newunit != $oldunit){
               if($newunit =='cubs' |$newunit =='sct' |$newunit =='asct' |$newunit =='tvlr'){

                   $unitscout->update(['unit_id' => $request->input('scout_unit.unit_id')]);







               }else {
                   if($newunit=='cap' && $captain->value('scout_id')==null){
                       $unitscout->delete();

                       $role = $request->input('role');
                       $unit_resp = $request->input('unit_resp');
                       $newcaptain = new Captain;
                       $newcaptain->scout_id = $scout_id;
                       $newcaptain->role =$role;
                       $newcaptain->unit =$unit_resp;
                       $newcaptain->save();

                   }
               }
           }else{

           }



     }

       /**
        * @param $id
        * delete a specific scout from data base
        * if deleted is a captain who have an account the account also will be deleted
        * @return \Illuminate\Http\JsonResponse
        */
    public function destroy($scout_id){


        /**
         * find and get data of the record who want to delete
         */
        $scout = Scout::find($scout_id);
        $captain = Captain::find($scout_id);
        $user = User::find($scout_id);
        $unitscouts = UnitScout::where('scout_id','=',$scout_id);


        /**
         * make sur he's a user or not (so has an  account or not)
         * if he has an account (means he's a captain) so we need to delete the account first
         * then delete his record from captain table then from scout table
         */

        if($user!=null){

            DB::delete('delete from users where scout_id = ?',[$scout_id]);
            $captain->delete();
            $scout->delete();
        }else {
            /**
             * if he don't have an account mean's he's a simple captain
             * so we need to delete his records from captain table then scout table
             */
            if ($captain!=null) {
               $captain->delete();
                $scout->delete();
            } else {
                /**
                 * if he's not a captain
                 * mean he's a simple scout of type (cub or scout or advanced_scout or traveler)
                 * so we will delete it from his unit then from scout table
                 */
                if ($scout!=null) {
                    $unitscouts->delete();
                    $scout->delete();
                } else {
                    /**
                     * here mean's he's not a scout
                     */
                    return response()->json(["msg" => "doesn't exist"]);
                }
            }

        }
            return response()->json(["msg"=>"deleted successfully"]);


    }






public function ExportScoutList(Request $request){
    $unit = $request->input('unit');
    $unit_name = $request->input('unit_name');
    $unit_fullname = ["unit"=>$unit_name];
    if($unit==""){
        $unit = Auth::user()->captain->unit;
        $unit_fullname =['unit'=>Auth::user()->captain->unit_name->unit_name];
        $scout_id = UnitScout::select('scout_id')->where('unit_id',$unit)->get();
        $scout_array=[];
        foreach($scout_id as $key){
            array_push($scout_array,$key->scout_id);
        }
        $scout = Scout::whereIn('scout_id',$scout_array)->get();

        $pdf = PDF::loadView('FormsTemplate.Scout_List',compact('scout','unit_fullname'));
    }else{
        if($unit=="cap"){
            $scout = Captain::with(['isScout','assignedRole'])->get();

            $pdf = PDF::loadView('FormsTemplate.Captain_List',compact('scout','unit_fullname'));

        }else{


            $scout_id = UnitScout::select('scout_id')->where('unit_id',$unit)->get();
            $scout_array=[];
            foreach($scout_id as $key){
                array_push($scout_array,$key->scout_id);
            }
            $scout = Scout::whereIn('scout_id',$scout_array)->get();
            $pdf = PDF::loadView('FormsTemplate.Scout_List',compact('scout','unit_fullname'));
    }






        }

    return $pdf->download('example.pdf');
}
public function UpdateCurriculumVitae(Request $request){

        $user = Auth::user()->scout_id;
        $captain = Scout::find($user);
        $captain->scout_info = $request->input('scout_info');
        $captain->personal_info = $request->input('personal_info');
        $captain->save();
}
public function getCurriculumVitae(){
    $user = Auth::user()->profile;
    $personal_info = $user->personal_info;
    $scout_info = $user->scout_info;
    return response()->json(["scout_info"=>$scout_info,"personal_info"=>$personal_info]);
}
    public function social_media_accounts(Request $request){
        $facebook = $request->input('facebook') ;
        $instagram = $request->input('instagram') ;
        $twitter = $request->input('twitter') ;

        $user = Auth::user()->scout_id;
        $captain = Captain::find($user);
        $captain->facebook =$facebook;
        $captain->instagram =$instagram;
        $captain->twitter =$twitter;
        $captain->save();
    }
public function getsocial_media_accounts(){
    $user = Auth::user()->captain;

        $facebook = $user->facebook;
        $instagram = $user->instagram;
        $twitter = $user->twitter;


    return response()->json(["facebook"=>$facebook,"instagram"=>$instagram,"twitter"=>$twitter]);
}

public function OptimizeImages ($url,$filename){
    if($filename!=""){
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
