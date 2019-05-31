<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitAnnouncement extends Controller
{
    //
    public function create(Request $request){
        $api_token = $request->input('api_token');
        $subject = $request->input('subject');
        $content = $request->input('content');

        $scout_id = User::where('api_token',$api_token)->get()->first()->scout_id;
        $unit_id = Captain::where('scout_id',$scout_id)->get()->first()->unit;

        $announcement = new UnitAnnouncement();
        $announcement->unit_id = $unit_id;
        $announcement->subject = $subject;
        $announcement->content = $content;
        $announcement->publisher = $scout_id;
        $announcement->save();
        
        return response()->json(["success"=>true]);
    }
}
