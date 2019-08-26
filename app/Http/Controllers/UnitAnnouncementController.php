<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Captain;
use App\UnitAnnouncement;

class UnitAnnouncementController extends Controller
{
    //
    public function create(Request $request){
        $api_token = $request->input('api_token');
        $subject = $request->input('subject');
        $content = $request->input('content');
        $image = $request->input('image');
        $imagext = $request->input('imagext');


        $scout_id = User::where('api_token',$api_token)->get()->first()->scout_id;
        $unit = Captain::where('scout_id',$scout_id)->get()->first()->unit;
		
		
		$unit_id = 0;
		switch($unit){
			case 'cubs':{
				  $unit_id = 1;
				  break;
			  
			}
			case 'sct':{
				  $unit_id = 2;
			      break;
			}
			case 'asct':{
				  $unit_id = 3;
			      break;
			}
			case 'tvlr':{
				  $unit_id = 4;
			      break;
			}
		}
		

        $_image = $this->insert_Image($image,$imagext,$unit_id);


        $announcement = new UnitAnnouncement();
        $announcement->unit_id = $unit_id;
        $announcement->subject = $subject;
        $announcement->content = $content;
        $announcement->publisher = $scout_id;
        $announcement->image = $_image;
        $announcement->save();
        
        return response()->json(["success"=>$announcement]);
    }

    public function insert_Image( $image,$exte,$unit_id){
        $filename="";
        $filepath="";
        if($image==""){
            return null;
        }else{
           
            $decode = base64_decode($image);
            
            $currenttime = Carbon::now()->timestamp;

            $file = null;
            switch ($unit_id){
                case 1:{
                    $filename = 'Cubs-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Cubs'))
                         mkdir(public_path().'/images/Announcement/Cubs',0700);
                   
						$file = '/images/Announcement/Cubs/'.$filename;
                    $filepath = public_path().$file;
                    break;
                }
                case 2:{
                    $filename = 'Scout-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Scout'))
                         mkdir(public_path().'/images/Announcement/Scout',0700);
                   
						$file = '/images/Announcement/Scout/'.$filename;
                    $filepath = public_path().$file;
                    break;
                }
                case 3:{
                    $filename = 'AdvancedScout-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/AdvancedScout'))
                       mkdir(public_path().'/images/Announcement/AdvancedScout',0700);
                   
					
					$file = '/images/Announcement/AdvancedScout/'.$filename;
                    $filepath = public_path().$file;
                    break;
                }
                case 4:{
                    $filename = 'Traveler-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Traveler'))
                        mkdir(public_path().'/images/Announcement/Traveler',0700);
					$file = '/images/Announcement/Traveler/'.$filename;
                    $filepath = public_path().$file;
                    break;
                }
               
            }

            file_put_contents($filepath,$decode);

           return $file;
        }
      

    }
	
	public function getUnitAnnouncements(Request $request){
		$unit_id = $request->input('unit_id');
		
		$announcements = UnitAnnouncement::where('unit_id',$unit_id)->get();
		
		$announcements = UnitAnnouncement::all();
		return response()->json(["announcements"=>$announcements]);
	}
}
