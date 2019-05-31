<?php

namespace  App\Http\Controllers;
use App\Concerned;
use App\Event;
use App\Notifications\notifyCaptain;
use App\UnitScout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Captain;
use App\User;
use App\Scout;
use App\Correspondence;
use PDF;
use DB;
use Auth;
use File;
use App\UnitsReport;
use Carbon\Carbon;





class FormsController extends  Controller

{
    //
    public function __construct()
    {
        set_time_limit(300);

    }
    public function delete_document($id){
        $document = Correspondence::find($id);
        $document_name = $document->file;
        File::delete(public_path().'/uploads/Correspondence/'.$document_name);
        $document->delete();

    }
    public function getGovernor(){
        $governor = Scout::find(Captain::where('role','gov')->value('scout_id'));
        $governor = $governor->last_name." ".$governor->first_name;
        return response()->json(["governor"=>$governor]);
    }
    public function GetCorrespondences(){
        $Correspondences_Not_Appr = Correspondence::with('sender')->where('approved',false)->get();
        $Correspondences_Appr = Correspondence::with('sender')->where('approved',true)->get();
      $public_path = url('/uploads/Correspondence/');
        return response()->json(["Correspondences_Not_Appr"=>$Correspondences_Not_Appr,"Correspondences_Appr"=>$Correspondences_Appr,"public_path"=>$public_path]);
    }
    public function GetMyCorrespondences(){
        $scout_id = Auth::user()->scout_id;

        $Correspondences_Not_Appr = Correspondence::with('sender')->where('sender',$scout_id)->where('approved',false)->get();
        $Correspondences_Appr = Correspondence::with('sender')->where('sender',$scout_id)->where('approved',true)->get();
      $public_path = url('/uploads/Correspondence/');
        return response()->json(["Correspondences_Not_Appr"=>$Correspondences_Not_Appr,"Correspondences_Appr"=>$Correspondences_Appr,"public_path"=>$public_path]);
    }
    public function Authenticate_Correspondence($correspondence_id){
       $correspondence_not_appr = Correspondence::find($correspondence_id);
        $correspondence_not_appr->approved = true;
        $correspondence_not_appr->save();

        $data=["content"=>$correspondence_not_appr->content,"subject"=>$correspondence_not_appr->subject,"to"=>$correspondence_not_appr->to,"date"=>$correspondence_not_appr->time,"agree"=>true,"gov"=>$correspondence_not_appr->gov,"outing_mail_number"=>$correspondence_not_appr->outing_mail_id];
        $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $correspondence_not_appr->file;

        file_put_contents($pdfroot, $pdf_string);


        $captain  = User::find($correspondence_not_appr->sender);
        $notification_type="وثيقة مصادق عليها";
        $notification_message = "قام محافظ الفوج بالمصادقة على وثيقة قمت بارسالها";
        $image = "/images/Report.png";
        if($captain!=null)
            $captain->notify(new notifyCaptain($notification_message,$notification_type,$image,Carbon::now()));


        return response()->json(["msg"=>$correspondence_not_appr]);
    }

    public function previewHonorary(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toscout = $request->input('toscout');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'toscout'=>$toscout,"gov"=>$gov];

        $pdf = PDF::loadView('/FormsTemplate/Honorary_meeting', compact('data'));

        return $pdf->download('example.pdf');
    }
    public function downloadHonoraryPDF(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toscout = $request->input('toscout');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'toscout'=>$toscout,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Honorary_meeting', compact('data'));

        return $pdf->download('example.pdf');
    }
    public function previewReporte_Scout_state_gov(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('state_scout_gov');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'state_scout_gov'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Reporter_state_scout_governor', compact('data'))->setPaper('a4');

        return $pdf->download('example.pdf');
    }

    public function downloadReporte_Scout_state_gov(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('state_scout_gov');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'state_scout_gov'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Reporter_state_scout_governor', compact('data'));

        return $pdf->download('example.pdf');
    }
    public function PreviewSecurity_ReporterPDF(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('urban_security_center_president');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'urban_security_center_president'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('/FormsTemplate/Security_Reporter', compact('data'));

        return $pdf->stream('example.pdf');
    }
    public function downloadSecurity_ReporterPDF(Request $request){
      $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $state_scout_gov = $request->input('urban_security_center_president');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'urban_security_center_president'=>$state_scout_gov,"gov"=>$gov];
        $pdf = PDF::loadView('FormsTemplate.Security_Reporter',compact('data'));

        return $pdf->download('example.pdf');
    }
    public function previewEducational_Institutions(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toperson = $request->input('toperson');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'toperson'=>$toperson,"gov"=>$gov];
        $pdf = PDF::loadView('FormsTemplate.Educational_Institutions', compact('data'));

        return $pdf->stream('example.pdf');
    }
    public function downloadEducational_Institutions(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toperson = $request->input('toperson');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'toperson'=>$toperson,"gov"=>$gov];
        $pdf = PDF::loadView('FormsTemplate.Educational_Institutions',compact('data'));

        return $pdf->download('example.pdf');
    }
    public function previewOuting_mailPDF(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail = $request->input('outing_mail');
        $toperson = $request->input('toperson');
        $subject = $request->input('subject');
        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'toperson'=>$toperson,"gov"=>$gov];
        $pdf = PDF::loadView('FormsTemplate.Outing_mail', compact('data'));

        return $pdf->stream('example.pdf');
    }
   public function downloadOuting_mailPDF(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');
        $outing_mail="15";
        $to = $request->input('to');
        $subject = $request->input('subject');
         $agree = true;
      if(Auth::user()->captain->role=="gov"){
            $filename =date('YmdHis',time()).mt_rand().'.pdf';
            $outing_mail=  DB::table('correspondences')->insertGetId([
                "sender"=>Auth::user()->scout_id,
                "time"=>$date,
                "to"=>$to,
                "subject"=>$subject,
                "content"=>$content,
                "gov"=>$gov,
                "approved"=>true,
                "file"=>$filename,
                "created_at"=>Carbon::now()->format('Y-m-d'),
            ]);
         $agree=true;
           $data =["agree"=>$agree,"content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov];

           $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
           $pdf_string = $pdf->output();
            $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

            file_put_contents($pdfroot, $pdf_string);

        }else{
          $filename =date('YmdHis',time()).mt_rand().'.pdf';
          if(Correspondence::count()==0){
              $outing_mail = 1;
          }else{
              $outing_mail = (Correspondence::all()->last()->outing_mail_id)+1;
          }

        /*  $outing_mail=  DB::table('correspondences')->insertGetId([
              "sender"=>Auth::user()->scout_id,
              "time"=>$date,
              "to"=>$to,
              "subject"=>$subject,
              "content"=>$content,
              "gov"=>$gov,
              "approved"=>false,
              "file"=>$filename,
              "created_at"=>Carbon::now()->format('Y-m-d'),
          ]);*/
          $agree=false;
          $data =["agree"=>$agree,"content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov];

          $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
          $pdf_string = $pdf->output();
          $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

          file_put_contents($pdfroot, $pdf_string);
         


        }

        $data =["agree"=>$agree,"content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov];

        $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));

        return $pdf->download('example.pdf');
    }
    public function SendOuting_mail_forAgree(Request $request){
        $content = $request->input('content');
        $date = $request->input('date');
        $gov = $request->input('gov');

        $to = $request->input('to');
        $subject = $request->input('subject');



        $filename =date('YmdHis',time()).mt_rand().'.pdf';




        $outing_mail=  DB::table('correspondences')->insertGetId([
            "sender"=>Auth::user()->scout_id,
            "time"=>$date,
            "to"=>$to,
            "subject"=>$subject,
            "content"=>$content,
            "gov"=>$gov,
            "file"=>$filename,
            "approved"=>false,
            "created_at"=>Carbon::now()->format('Y-m-d'),
        ]);



        $data =["content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov,"agree"=>false];
        $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

        file_put_contents($pdfroot, $pdf_string);
        $gov = User::find(Captain::where('role','gov')->value('scout_id'));
        $notification_message="تم ارسال لك وثيقة جديدة للمصادقة عليها ";
        $notification_type = "وثيقة جديدة للمصادقة عليها";
        $image = "/images/Report.png";
        if($gov!=null)
            $gov->notify(new notifyCaptain($notification_message,$notification_type,$image,Carbon::now()));





        return response()->json(['msg'=>'Successfully sent']);
    }
    public function downloadInaugurationPDF(Request $request){
       $date = $request->input('date');
        $time = $request->input('time');
        $elected = $request->input('elected.0');
        $elected =$elected['last_name'].' '.$elected['first_name'];
        $role = $request->input('role.0');
        $location = $request->input('location');
        $presence = $request->input('presence');
        $data =["date"=>$date,"time"=>$time,"elected"=>$elected,"role"=>$role,"location"=>$location,'presence'=>$presence];
        $pdf = PDF::loadView('FormsTemplate.inauguration',compact('data'));

        return $pdf->download('example.pdf');
    }
    public function downloadAssigning_missionPDF (Request $request){
        $outing_mail = $request->input('outing_mail');
       $fullname = $request->input('fullname.0');
        $fullname_id =$fullname['scout_id'] ;
        $fullname_role = Captain::find($fullname['scout_id'])->assignedRole->getRole();
        $fullname =$fullname['last_name'].' '.$fullname['first_name'];
        $date = $request->input('date');
        $from = $request->input('from');
        $to = $request->input('to');
        $charged = $request->input('charged.0');
        $charged_birth_day = $charged['date_of_birth'];
        $charged_place_of_birth = $charged['place_of_birth'];
        $charged_id =$charged['scout_id'];
        $charged_role =Captain::find($charged['scout_id'])->assignedRole->getRole();;
        $charged =$charged['last_name'].' '.$charged['first_name'];
        $framed = $request->input('framed');
        $organiser = $request->input('organiser');
        $mission = $request->input('mission');
        $location = $request->input('location');

        if($from == $to){
            $time = $from;
        }else{
            $from_year = substr($from,0,4);
            $to_year = substr($from,0,4);

            if($from_year == $to_year){
                $from_month = substr($from,5,2);
                $to_month = substr($from,5,2);
                if($from_month == $to_month){
                    $from_day =  substr($from,8,2);
                    $to_day =  substr($to,8,2);
                    $time =$from_day.'-'.$from_year.'/'.$from_month.'/'.$to_day;
                }else{
                    $time =$to.'-'. $from;
                }
            }else{
                $time =$to.'-'. $from;
            }
        }

        $filename =date('YmdHis',time()).mt_rand().'.pdf';
        $outing_mail = DB::table('correspondences')->insertGetId([
            "sender"=>Auth::user()->scout_id,
            "time"=>"",
            "to"=>"",
            "subject"=>"تكليف بهمة كشفية",
            "content"=>"",
            "gov"=>"",
            "approved"=>true,
            "file"=>$filename,
            "created_at"=>Carbon::now()->format('Y-m-d'),
        ]);
        $data =["outing_mail"=>$outing_mail,
            "date"=>$date,
            "fullname"=>$fullname,
            "fullname_role"=>$fullname_role,
            "time"=>$time,"charged"=>$charged,
            "charged_role"=>$charged_role,
            "date_of_birth"=>$charged_birth_day,
            "place_of_birth"=>$charged_place_of_birth,
            "mission"=>$mission,
            "framed"=>$framed,
            'organiser'=>$organiser,
            'location'=>$location];
        $pdf = PDF::loadView('FormsTemplate.Assigning_mission',compact('data'));
        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

        file_put_contents($pdfroot, $pdf_string);
        return $pdf->download('example.pdf');
    }
    
    public function mdownloadAssigning_missionPDF(Request $request){
        $outing_mail = $request->input('outing_mail');
    
        $date = $request->input('date');
        $from = $request->input('from');
        $to = $request->input('to');
        $charged = $request->input('charged');
        $framed = $request->input('framed');
        $organiser = $request->input('organiser');
        $mission = $request->input('mission');
        $location = $request->input('location');
        $api_token = $request->input('api_token');
        $fullname = $request->input('fullname');

        if($from == $to){
            $time = $from;
        }else{
            $from_year = substr($from,0,4);
            $to_year = substr($from,0,4);

            if($from_year == $to_year){
                $from_month = substr($from,5,2);
                $to_month = substr($from,5,2);
                if($from_month == $to_month){
                    $from_day =  substr($from,8,2);
                    $to_day =  substr($to,8,2);
                    $time =$from_day.'-'.$from_year.'/'.$from_month.'/'.$to_day;
                }else{
                    $time =$to.'-'. $from;
                }
            }else{
                $time =$to.'-'. $from;
            }

            
        }

        $filename =date('YmdHis',time()).mt_rand().'.pdf';
        $outing_mail = DB::table('correspondences')->insertGetId([
            "sender"=>User::where('api_token',$api_token)->get()->first()->scout_id,
            "time"=>"",
            "to"=>"",
            "subject"=>"تكليف بهمة كشفية",
            "content"=>"",
            "gov"=>"",
            "approved"=>true,
            "file"=>$filename,
            "created_at"=>Carbon::now()->format('Y-m-d'),
        ]);
        $data =["outing_mail"=>$outing_mail,
            "date"=>$date,
            "time"=>$time,
            "charged"=>$charged,
            "mission"=>$mission,
            "fullname"=>$fullname,
            "framed"=>$framed,
            'organiser'=>$organiser,
            'location'=>$location];
        $pdf = PDF::loadView('FormsTemplate.Assigning_mission_mobile',compact('data'));
        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

        file_put_contents($pdfroot, $pdf_string);
        return $pdf->download('example.pdf');
    }

	  public function mdownloadOuting_mailPDF(Request $request){
        $api_token = $request->input('api_token');
	    $content = $request->input('content');
        $date = $request->input('date');
        $outing_mail="15";
        $to = $request->input('to');
        $subject = $request->input('subject');
		 $gov = Scout::where('scout_id',Captain::where('role','gov')->get()->first()->scout_id)->get()->first();
		 $gov = $gov->last_name." ".$gov->first_name;

		 $filename="";
         $agree = true;
      if(User::where('api_token',$api_token)->get()->first()->captain->role!="gov"){
            $filename =date('YmdHis',time()).mt_rand().'.pdf';
            $outing_mail=  DB::table('correspondences')->insertGetId([
                "sender"=>User::where('api_token',$api_token)->get()->first()->scout_id,
                "time"=>$date,
                "to"=>$to,
                "subject"=>$subject,
                "content"=>$content,
                "gov"=>$gov,
                "approved"=>true,
                "file"=>$filename,
                "created_at"=>Carbon::now()->format('Y-m-d'),
            ]);
         $agree=true;
           $data =["agree"=>$agree,"content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov];

           $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
           $pdf_string = $pdf->output();
            $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

            file_put_contents($pdfroot, $pdf_string);

        }else{
          $filename =date('YmdHis',time()).mt_rand().'.pdf';
          if(Correspondence::count()==0){
              $outing_mail = 1;
          }else{
              $outing_mail = (Correspondence::all()->last()->outing_mail_id)+1;
          }

          $agree=false;
          $data =["agree"=>$agree,"content"=>$content,"date"=>$date,'outing_mail_number'=>$outing_mail,'subject'=>$subject,'to'=>$to,"gov"=>$gov];

          $pdf = PDF::loadView('/FormsTemplate/Outing_mail',compact('data'));
          $pdf_string = $pdf->output();
          $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

          file_put_contents($pdfroot, $pdf_string);
         


        }

        

        return response()->json($pdf->download('example.pdf'));
    }
    public function getMyScout(){
        $user_unit = Auth::user()->captain->unit;
        $myscouts_id = DB::table('unitscouts')
                    ->select('scout_id')
                   ->where('unit_id',$user_unit)
                   ->get();
        $MyScouts=[];
        foreach ($myscouts_id as $key){
           $myscout = Scout::find($key->scout_id);
            array_push($MyScouts,$myscout);
        }

        return response()->json(["myscout"=>$MyScouts,"unit_name"=>$user_unit]);
    }
    public function downloadActivityPaperPDF(Request $request){
        $date = $request->input('date');
        $time = $request->input('time');
        $location = $request->input('location');
        $activity_number = $request->input('activity_number');
        $goals = $request->input('goals');
        $cap_presence= $request->input('cap_presence');
        $scout_presence= $request->input('scout_presence');
        $scout_absence= $request->input('scout_absence');
        $scout_absence_cause= $request->input('scout_absence_cause');
        $notes= $request->input('notes');
        $end_time= $request->input('end_time');


        $data =["date"=>$date,
                "time"=>$time,
                "location"=>$location,
                "activity_number"=>$activity_number,
                "cap_presence"=>$cap_presence,
                "scout_presence"=>$scout_presence,
                "scout_absence"=>$scout_absence,
                "scout_absence_cause"=>$scout_absence_cause,
                "notes"=>$notes,
                "end_time"=>$end_time,
               ];
        $pdf = PDF::loadView('FormsTemplate.ActivityPaper',compact('data','goals','cap_presence','scout_presence','scout_absence','scout_absence_cause','notes'));

        return $pdf->download('example.pdf');
    }
    public function SendActivityPaperPDF(Request $request){
        $date = $request->input('date');
        $time = $request->input('time');
        $location = $request->input('location');
        $activity_number = $request->input('activity_number');
        $goals = $request->input('goals');
        $cap_presence= $request->input('cap_presence');
        $scout_presence= $request->input('scout_presence');
        $scout_absence= $request->input('scout_absence');
        $scout_absence_cause= $request->input('scout_absence_cause');
        $notes= $request->input('notes');
        $end_time= $request->input('end_time');


        $data =["date"=>$date,
                "time"=>$time,
                "location"=>$location,
                "activity_number"=>$activity_number,
                "cap_presence"=>$cap_presence,
                "scout_presence"=>$scout_presence,
                "scout_absence"=>$scout_absence,
                "scout_absence_cause"=>$scout_absence_cause,
                "notes"=>$notes,
                "end_time"=>$end_time,
               ];
        $pdf = PDF::loadView('FormsTemplate.ActivityPaper',compact('data','goals','cap_presence','scout_presence','scout_absence','scout_absence_cause','notes'));
        $pdf_string = $pdf->output();

        $current_year_month = date('m-Y');
        $filename =date('YmdHis',time()).mt_rand().'.pdf';
        $unit = Auth::user()->captain->unit_name->unit_name;
        $old_report_id = UnitsReport::select('id')
            ->where('unit',$unit)
            ->where('month',Carbon::now()->month)
            ->where('type','activity_paper')
            ->whereYear('created_at', date('Y'))
            ->get();
        if(count($old_report_id)==1) {
            $old_report = UnitsReport::find($old_report_id[0]->id);
            $filename = $old_report->file_name;
            $old_report->delete();
        }

        $pdfroot = public_path() . '/uploads/Units_Report/' . $filename;


        file_put_contents($pdfroot, $pdf_string);

       $description ="تقرير وحدة".$unit." ".$current_year_month;
        $report = new UnitsReport;

        $report->file_name = $filename;
        $report->month = Carbon::now()->month;
        $report->report_date = $date;
        $report->unit = $unit;
        $report->type = 'activity_paper';
        $report->description = $description;
        $report->created_at = Carbon::now();
        $report->save();






        $surv = User::find(Captain::where('role','surv')->value('scout_id'));
        $notification_message = "تم ارسال ورقة نشاط  لوحدة ". $unit.' '.$current_year_month;
        $notification_type ="ورقة نشاط";
        $image = "/images/Report.png";
        if($surv!=null)
            $surv->notify(new notifyCaptain($notification_message,$notification_type,$image,Carbon::now()));
        return;
    }
    public function manageMonthlyRapportPDF(Request $request){
       $date = $request->input('date');
       $month = $request->input('month');
       $first_name = $request->input('first_name');
       $last_name = $request->input('last_name');
          $first_activity = $request->input('first_activity');
        $second_activity = $request->input('second_activity');
        $third_activity = $request->input('third_activity');
        $fourth_activity = $request->input('fourth_activity');

         $first_sport = $request->input('first_sport');
          $second_sport = $request->input('second_sport');
          $third_sport = $request->input('third_sport');
          $fourth_sport = $request->input('fourth_sport');

          $first_activ_cap_pres = $request->input('first_activ_cap_pres');
        $second_activ_cap_pres = $request->input('second_activ_cap_pres');
         $third_activ_cap_pres = $request->input('third_activ_cap_pres');
         $fourth_activ_cap_pres = $request->input('fourth_activ_cap_pres');

         $first_sport_cap_pres = $request->input('first_sport_cap_pres');
         $second_sport_cap_pres = $request->input('second_sport_cap_pres');
         $third_sport_cap_pres = $request->input('third_sport_cap_pres');
         $fourth_sport_cap_pres = $request->input('fourth_sport_cap_pres');

         $EDSubjects = $request->input('EDSubjects');
        $EDGoals = $request->input('EDGoals');
        $SCSubjects = $request->input('SCSubjects');
        $SCGoals = $request->input('SCGoals');
        $CULSubjects = $request->input('CULSubjects');
         $CULGoals = $request->input('CULGoals');
       $SKLSubjects = $request->input('SKLSubjects');
         $SKLGoals = $request->input('SKLGoals');
       $SONGSubjects = $request->input('SONGSubjects');
       $SONGgoals = $request->input('SONGgoals');
       $GAMESubjects = $request->input('GAMESubjects');
       $GAMEGoals = $request->input('GAMEGoals');
       $Shortages = $request->input('Shortages');
       $Positives = $request->input('Positives');
       $Proposales = $request->input('Proposales');


       $arprog_perc = $request->input('arprog_perc');
       $max_scout_pres = $request->input('max_scout_pres');
       $min_scout_pres = $request->input('min_scout_pres');
       $max_cap_pres = $request->input('max_cap_pres');
         $min_cap_pres = $request->input('min_cap_pres');
         $total_monthly_expenses = $request->input('total_monthly_expenses');
         $unit_fin_pos = $request->input('unit_fin_pos');
				$unit = Auth::user()->captain->unit_name->unit_name;
				$operation_type = $request->input('operation_type');
       $report_unit = Auth::user()->captain->unit;
        $data=["date"=>$date,
               "unit"=>$unit,
                "report_unit"=>$report_unit,
               "month"=>$month,
               "first_name"=>$first_name,
               "last_name"=>$last_name,
               "first_activity_date"=>$first_activity,
               "second_activity_date"=>$second_activity,
               "third_activity_date"=>$third_activity,
               "fourth_activity_date"=>$fourth_activity,
               "first_sport_date"=>$first_sport,
               "second_sport_date"=>$second_sport,
               "third_sport_date"=>$third_sport,
               "fourth_sport_date"=>$fourth_sport,
               "arprog_perc"=>$arprog_perc,
               "max_scout_pres"=>$max_scout_pres,
               "min_scout_pres"=>$min_scout_pres,
               "max_cap_pres"=>$max_cap_pres,
               "min_cap_pres"=>$min_cap_pres,
               "total_monthly_expenses"=>$total_monthly_expenses,
               "unit_fin_pos"=>$unit_fin_pos,

					 ];

        $pdf = PDF::loadView('FormsTemplate.NewRapport',compact('data',
                                                                    'first_activ_cap_pres',
                                                                       'second_activ_cap_pres',
                                                                        'third_activ_cap_pres',
                                                                        'fourth_activ_cap_pres',
                                                                        'first_sport_cap_pres',
                                                                        'second_sport_cap_pres',
                                                                        'third_sport_cap_pres',
                                                                        'fourth_sport_cap_pres',
                                                                        'EDSubjects',
                                                                        'EDGoals',
                                                                        'SCSubjects',
                                                                        'SCGoals',
                                                                        'CULSubjects',
                                                                        'CULGoals',
                                                                        'SKLSubjects',
                                                                        'SKLGoals',
                                                                        'SONGSubjects',
                                                                        'SONGgoals',
                                                                        'GAMESubjects',
                                                                        'GAMEGoals',
                                                                        'Shortages',
                                                                        'Positives',
                                                                        'Proposales'    ));
        if($operation_type == "send"){
           $current_year_month = date('m-Y');
            $filename =date('YmdHis',time()).mt_rand().'.pdf';
            $description = ' التقرير الشهري لوحدة '.$unit.''.$current_year_month;

            $old_report_id = UnitsReport::select('id')
						                        ->where('unit',$unit)
                                    ->where('month',Carbon::now()->month)
                                    ->where('type','report')
                                    ->whereYear('created_at', date('Y'))
                                    ->get();
            if(count($old_report_id)==1) {
                $old_report = UnitsReport::find($old_report_id[0]->id);
								$filename = $old_report->file_name;
                $old_report->delete();
            }
                $report = new UnitsReport;

                $report->file_name = $filename;
                $report->month = Carbon::now()->month;
                $report->report_date = $date;
                $report->unit = $unit;
                $report->type = "report";
                $report->description = $description;
                $report->created_at = Carbon::now();
                $report->save();
                $pdf_string = $pdf->output();

                $pdfroot = public_path() . '/uploads/Units_Report/' . $filename;
                file_put_contents($pdfroot, $pdf_string);
                $vgov = User::find(Captain::where('role','vgov')->value('scout_id'));
                $notification_message = "تم ارسال التقرير الشهري لوحدة ". $unit;
            $notification_type = "نقرير شهري";
            $image = "/images/Report.png";
            if($vgov!=null)
            $vgov->notify(new notifyCaptain($notification_message,$notification_type,$image,Carbon::now()));

        }else
        return $pdf->download('example.pdf');

    }
    public function GetMonthlyReport(){
			if(Auth::user()->captain->role == "surv"){
				$monthly_reports = UnitsReport::select('file_name','unit','description')
																				->where(DB::raw('MONTH(month)',Carbon::now()->format('m')))
																				->where('unit','!=','المالية')
																				->where('type','report')
																				->whereYear('created_at', date('Y'))
																				->get();
			}else{
				$monthly_reports = UnitsReport::select('file_name','unit','description')
																				->where(DB::raw('MONTH(month)',Carbon::now()->format('m')))
                                                                               ->where('type','report')
																				->whereYear('created_at', date('Y'))
																				->get();
			}

        $public_path = url('/uploads/Units_Report/');
        return response()->json(["reports"=>$monthly_reports,"public_path"=>$public_path]);
    }
    public function GetReport(Request $request){
        $month = $request->input('month');
        $year = $request->input('year');
        if(Auth::user()->captain->role == "surv"){
            $monthly_reports = UnitsReport::select('file_name','unit','description')
                ->where('month',$month)
                ->where('unit','!=','المالية')
                ->where('type','report')
                ->whereYear('created_at', $year)
                ->get();
        }else{
            $monthly_reports = UnitsReport::select('file_name','unit','description')
                ->where('month',$month)
                ->where('type','report')
                ->whereYear('created_at', $year)
                ->get();
        }

        $public_path = url('/uploads/Units_Report/');
        return response()->json(["reports"=>$monthly_reports,"public_path"=>$public_path]);
    }
    public function GetActivity_Paper_Report(Request $request){
        $month = $request->input('month');
        $year = $request->input('year');

            $monthly_reports = UnitsReport::select('file_name','unit','description')
                ->where('month',$month)

                ->where('type','activity_paper')
                ->whereYear('created_at', $year)
                ->get();



        $public_path = url('/uploads/Units_Report/');
        return response()->json(["reports"=>$monthly_reports,"public_path"=>$public_path]);
    }
    public function Assigning_mission_travel(Request $request){
        $fullname = $request->input('fullname');
        $charged = $request->input('charged');
        $mission_type = $request->input('mission_type');
        $paper_name = $request->input('paper_name');
        $issued_by = $request->input('issued_by');
        $mission = $request->input('mission');
        $serial_number = $request->input('serial_number');
        $paper_code = $request->input('paper_code');
        $scout_job="";
     

        if(is_array($fullname)){
            $scout_job =Captain::find($fullname[0]['scout_id'])->assignedRole->getRole() ;
            $fullname = $fullname[0]['last_name']." ".$fullname[0]['first_name'];


        }
        $filename =date('YmdHis',time()).mt_rand().'.pdf';
        $outing_mail = DB::table('correspondences')->insertGetId([
            "sender"=>Auth::user()->scout_id,
            "time"=>"",
            "to"=>"",
            "subject"=>"تكليف بهمة",
            "content"=>"",
            "gov"=>"",
            "approved"=>true,
            "file"=>$filename,
            "created_at"=>Carbon::now()->format('Y-m-d'),
        ]);
        $data=["fullname"=>$fullname,
               "scout_job"=>$scout_job,
               "charged"=>$charged,
                "mission_type"=>$mission_type,
               "paper_name"=>$paper_name,
               "issued_by"=>$issued_by,
               "serial_number"=>$serial_number,
               "paper_code"=>$paper_code,
               "mission"=>$mission,
               "outing_mail"=>$outing_mail

            ];
        $pdf = PDF::loadView('/FormsTemplate/Assigning_mission_Travel',compact('data'));

        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

        file_put_contents($pdfroot, $pdf_string);

        return $pdf->download();


    }

    public function mAssigning_mission_travel(Request $request){
        $api_token = $request->input('api_token');
        $fullname = $request->input('fullname');
        $charged = $request->input('charged');
        $mission_type = $request->input('mission_type');
        $paper_name = $request->input('paper_name');
        $issued_by = $request->input('issued_by');
        $mission = $request->input('mission');
        $serial_number = $request->input('serial_number');
        $paper_code = $request->input('paper_code');
        $scout_job="";
        $user_id = User::where('api_token',$api_token)->get()->first()->scout_id;

        
        $scout_job =Captain::find($user_id)->assignedRole->getRole();
           
        
        $filename =date('YmdHis',time()).mt_rand().'.pdf';
        $outing_mail = DB::table('correspondences')->insertGetId([
            "sender"=>$user_id,
            "time"=>"",
            "to"=>"",
            "subject"=>"تكليف بهمة",
            "content"=>"",
            "gov"=>"",
            "approved"=>true,
            "file"=>$filename,
            "created_at"=>Carbon::now()->format('Y-m-d'),
        ]);
        $data=["fullname"=>$fullname,
               "scout_job"=>$scout_job,
               "charged"=>$charged,
                "mission_type"=>$mission_type,
               "paper_name"=>$paper_name,
               "issued_by"=>$issued_by,
               "serial_number"=>$serial_number,
               "paper_code"=>$paper_code,
               "mission"=>$mission,
               "outing_mail"=>$outing_mail

            ];
        $pdf = PDF::loadView('/FormsTemplate/mobile_Assigning_mission_Travel',compact('data'));

        $pdf_string = $pdf->output();
        $pdfroot = public_path() . '/uploads/Correspondence/' . $filename;

        file_put_contents($pdfroot, $pdf_string);

        return response()->json($pdf->download());


    }


    public function getPresentCaptains($event_id){


        $captains_list = DB::table('concerned')
            ->join('captains', 'concerned.scout_id', 'captains.scout_id')
            ->join('scouts', 'concerned.scout_id', 'scouts.scout_id')
            ->join('events', 'concerned.event_id', 'events.event_id')
            ->join('roles', 'roles.name', 'captains.role')
            ->where('concerned.event_id',$event_id)
            ->where('concerned.presence',1)
            ->get();

//        $concerned = Concerned::where([
//                ['event_id', $event_id],
//                ['presence', 1]
//                ])->select('scout_id as scout')->get();
//
//        $captains_list = array();
//        foreach($concerned as $captain)
//            $captains_list[] = $captain->scout;

        return $captains_list;
    }
    // export pdf contains list of captains who confirm present in an event

    public function ExportPresentCaptains(Request $request,$event_id){
        $choice = $request->input('choice');
        $captains = $this->getPresentCaptains($event_id);
        $event = Event::find($event_id);
        $title = $event->title;
        $event_time = $event->event_time;
        $responsible =Scout::find($event->responsible);
        $concerneds =Concerned::where('event_id',$event_id)->count();

        $pdf = PDF::loadView('FormsTemplate.PresentCaptains_List',compact('captains','choice','title','event_time','responsible','concerneds'));
        return $pdf->download();
        // return response()->json(["data"=>$choice]);
    }

}
