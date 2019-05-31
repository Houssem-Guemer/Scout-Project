<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Captain;
use App\UnitAnnouncement;

class UnitAnnouncement extends Controller
{
    //
    public function create(Request $request){
        $api_token = $request->input('api_token');
        $subject = $request->input('subject');
        $content = $request->input('content');
        $image = $request->input('image');
        $imagext = $request->input('imagext');


        $scout_id = User::where('api_token',$api_token)->get()->first()->scout_id;
        $unit_id = Captain::where('scout_id',$scout_id)->get()->first()->unit;

        $_image = $this->insert_Image($image,$imagext,$unit_id);


        $announcement = new UnitAnnouncement();
        $announcement->unit_id = $unit_id;
        $announcement->subject = $subject;
        $announcement->content = $content;
        $announcement->publisher = $scout_id;
        $announcement->image = $_image;
        $announcement->save();
        
        return response()->json(["success"=>true]);
    }

    public function insert_Image( $image,$exte,$unit_id){
        $filename="";
        $filepath="";
        if($image==""){
            $filename="";
        }else{
           
            $decode = base64_decode($image);
            
            $currenttime = Carbon::now()->timestamp;

            switch ($unit_id){
                case 1:{
                    $filename = 'Cubs-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Cubs'))
                         mkdir(public_path().'/images/Announcement/Cubs',0700);
                    $filepath = public_path().'/images/Announcement/Cubs/'.$filename;
                    break;
                }
                case 2:{
                    $filename = 'Scout-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Scout'))
                         mkdir(public_path().'/images/Announcement/Scout',0700);
                    $filepath = public_path().'/images/Announcement/Scout/'.$filename;
                    break;
                }
                case 3:{
                    $filename = 'AdvancedScout-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/AdvancedScout'))
                       mkdir(public_path().'/images/Announcement/AdvancedScout',0700);
                    $filepath = public_path().'/images/Announcement/AdvancedScout/'.$filename;
                    break;
                }
                case 4:{
                    $filename = 'Traveler-'.$currenttime.'.'.$exte;
                    if(!file_exists(public_path().'/images/Announcement/Traveler'))
                        mkdir(public_path().'/images/Announcement/Traveler',0700);
                    $filepath = public_path().'/images/Announcement/Traveler/'.$filename;
                    break;
                }
               
            }

            file_put_contents($filepath,$decode);

        }
        return $filename;

    }
}
