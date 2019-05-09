<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Finance;
use Carbon\Carbon;
use DB;
use PDF;
use Auth;
use App\UnitsReport;
use App\Captain;
use App\User;
use App\Notifications\notifyCaptain;
class FinanceController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');

    }
    public function update_BankAccount_Info(Request $request){
        $account_value = $request->input('money');
        $last_view = $request->input('date');
        $view_by = Auth::user()->profile->getFullName();
        $account = new BankAccount;
        $account->last_view = $last_view;
        $account->account_value = $account_value;
        $account->view_by = $view_by;
        $account->save();

    }
    public function GetMoneyFundInfo(){
        $current_price = Finance::orderby('id','desc')->first()->money_total;
        $last_price = Finance::orderby('id','desc')->skip(1)->take(1)->get()[0]->money_total;
        return response()->json(["current_price"=>$current_price,"last_price"=>$last_price]);
    }
	public function update_money(Request $request){
	$money = $request->input('money');
	$date = $request->input('date');
	$desc = $request->input('description');
	$money_state = $request->input('money_state');
	$finance = Finance::all();

	if(count($finance)==0){
		$first_money = new Finance;
		$first_money->transaction_money = $money;
	 $first_money->transaction_date = $date;
		$first_money->transaction_description = $desc;
		$first_money->money_total = $money;
		$first_money->save();
			return response()->json(["msg"=>"Success"]);
}else{
	$new_transaction = new Finance;

	$last_row = Finance::latest()->first();
	if(!$money_state){
			$totale = $last_row->money_total - $money;
			$money = "-".$money;

	}else{
			$totale = $last_row->money_total + $money;
	}
	$new_transaction->transaction_money = $money;
	$new_transaction->transaction_date = $date;
	$new_transaction->transaction_description=$desc;
	$new_transaction->money_total=$totale;
	$new_transaction->save();
return response()->json(["msg"=>"Success"]);
}



}
public function getmoney_values(){

	$current_month = Carbon::now()->format('m');
	$money =DB::table("finances")
	->select('id')

				->whereRaw('MONTH(transaction_date) = ?',[$current_month])
                ->orderBy('transaction_date','asc')
				->get();

				$money_values = [];
				$transaction_date=[];
				$transaction_description=[];
                 $trans_money=[];
			foreach($money as $key){
					$transaction_money = Finance::select('money_total','transaction_date','transaction_description','transaction_money')
															 ->where('id',$key->id)
															 ->orderBy('transaction_date','asc')
															 ->get()[0];
						array_push($money_values,$transaction_money->money_total);
						array_push($transaction_date,$transaction_money->transaction_date);
                        array_push($transaction_description,$transaction_money->transaction_description );

                        array_push($trans_money,$transaction_money->transaction_money );

				}



$current_month_days=[];
			for($i=1;$i<=31;$i++){
				array_push($current_month_days,$i);
			}



	return  response()->json(["money_values"=>[$money_values,$transaction_date,$current_month_days,$transaction_description,$trans_money]]);
}
public function getaccount_monthly_review(){

	$current_month = Carbon::now()->format('m');
	$money =DB::table("bank_account")
	->select('id')

				->whereRaw('MONTH(last_view) = ?',[$current_month])
                ->orderBy('last_view','asc')
				->get();

				$money_values = [];
				$last_view=[];
				$view_by=[];

			foreach($money as $key){
					$money_data = BankAccount::select('account_value','last_view','view_by')
															 ->where('id',$key->id)
															 ->orderBy('last_view','asc')
															 ->get()[0];
						array_push($money_values,$money_data->account_value);
						array_push($last_view,$money_data->last_view);
                        array_push($view_by,$money_data->view_by );



				}



$current_month_days=[];
			for($i=1;$i<=31;$i++){
				array_push($current_month_days,$i);
			}




	return  response()->json(["money_values"=>[$money_values,$last_view,$current_month_days,$view_by]]);
}

public function getyearly_money(){
	$months=["جانفي","فيفري","مارس","أفريل","ماي","جوان","جويلية","أوت","سبتمبر","أكتوبر","نوفمبر","ديسمبر"];
    $current_year = Carbon::now()->format('Y');

	$money =DB::table("finances")
        ->select('id')

        ->whereRaw('YEAR(transaction_date) = ?',[$current_year])
        ->orderBy('transaction_date','asc')
        ->get();

    $money_values=[];
    $transaction_date=[];
    $transaction_description=[];
    $trans_money=[];
    foreach($money as $key){
        $transaction_money = Finance::select('money_total','transaction_date','transaction_description','transaction_money')
            ->where('id',$key->id)
            ->orderBy('transaction_date','asc')
            ->get()[0];

        array_push($money_values,$transaction_money->money_total);
        array_push($transaction_date,$months[date("m",strtotime($transaction_money->transaction_date))-1] );
        array_push($transaction_description,$transaction_money->transaction_description );
        array_push($trans_money,$transaction_money->transaction_money );

    }
    return  response()->json(["money_values"=>[$money_values,$transaction_date,$months,$transaction_description,$trans_money]]);

}
public function getyearly_money_account(){
    $months=["جانفي","فيفري","مارس","أفريل","ماي","جوان","جويلية","أوت","سبتمبر","أكتوبر","نوفمبر","ديسمبر"];    $current_year = Carbon::now()->format('Y');

	$money =DB::table("bank_account")
        ->select('id')

        ->whereRaw('YEAR(last_view) = ?',[$current_year])
        ->orderBy('last_view','asc')
        ->get();

    $money_values=[];
    $view_by=[];
    $last_view=[];

    foreach($money as $key){
        $transaction_money = BankAccount::select('last_view','account_value','view_by')
            ->where('id',$key->id)
            ->orderBy('last_view','asc')
            ->get()[0];

        array_push($money_values,$transaction_money->account_value);
        array_push($last_view,$months[date("m",strtotime($transaction_money->last_view))-1] );
        array_push($view_by,$transaction_money->view_by );


    }
    return  response()->json(["money_values"=>[$money_values,$last_view,$months,$view_by]]);

}
public function getFinanceInfo(){
$all_money = DB::table('finances')->select('money_total')->orderBy('id', 'desc')->first();
if($all_money!=null)
    $all_money = $all_money->money_total;
else
    $all_money = "00";

    $fromDate = Carbon::now()->subDay()->startOfWeek()->toDateString(); // or ->format(..)
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


    return  response()->json(["all_money"=>$all_money,"this_week_money"=>$this_week_money,"this_month_money"=>$this_month_money]);
}
public function SendFinanceReport(){

		$current_month = Carbon::now()->format('m');
		$month_array = array("جانفي","فيفري","مارس","أفريل","ماي","جوان","جويلية","أوت","سبتمبر","أكتوبر","نوفمبر","ديسمبر");
		
		
		$month_name = $month_array[date('m')-1];
		
		$year = date('Y');
		$money =DB::table("finances")
		->select('id','transaction_money','transaction_date','transaction_description')

					->whereRaw('MONTH(transaction_date) = ?',[$current_month])
					->get();
					  $filename =date('YmdHis',time()).mt_rand().'.pdf';
					$old_report_id = UnitsReport::select('id')
					                       ->where('unit','المالية')
																	->where('month',Carbon::now()->month)
																	->whereYear('created_at', date('Y'))
																	->get();
							if(count($old_report_id)==1) {
							 $old_report = UnitsReport::find($old_report_id[0]->id);
							 $filename = $old_report->file_name;
								$old_report->delete();
								}

						$current_year_month = date('m-Y');
						$date = date('Y-m-d');
					$description = 'تقرير المالية لشهر '.$current_year_month;
					  $report = new UnitsReport;
					$report->file_name = $filename;
					$report->month = Carbon::now()->month;
					$report->report_date = $date;
					$report->unit = "المالية";
					$report->type="report";
					$report->description = $description;
					$report->created_at = Carbon::now();
					$report->save();
						$pdf = PDF::loadView('FormsTemplate.FinanceReport', compact('money','month_name','year'));
					$pdf_string = $pdf->output();

					$pdfroot = public_path() . '/uploads/Units_Report/' . $filename;
					file_put_contents($pdfroot, $pdf_string);
					$vgov = User::find(Captain::where('role','vgov')->value('scout_id'));
					$notification_message = "تم ارسال تقرير المالية لهذا الشهر";
			$notification_type = "تقرير المالية الشهري";
			$image = "/images/Report.png";
			//if($vgov!=null)
			//$vgov->notify(new notifyCaptain($notification_message,$notification_type,$image,Carbon::now()));



}
public function DownloadFinanceReport(){
	$current_month = Carbon::now()->format('m');
	$money =DB::table("finances")
	->select('id','transaction_money','transaction_date','transaction_description')

				->whereRaw('MONTH(transaction_date) = ?',[$current_month])
				->get();

				$pdf = PDF::loadView('FormsTemplate.FinanceReport', compact('money'));

				return $pdf->download('example.pdf');
}
public function this_month_money_report(){
	$current_month = Carbon::now()->format('m');
	$money =DB::table("finances")
	->select('id','transaction_money','transaction_date','transaction_description')

				->whereRaw('MONTH(transaction_date) = ?',[$current_month])
				->get();
				return response()->json(['money_data'=>$money]);
}

    public function mgetmoney_values(){

        $current_month = Carbon::now()->format('m');
        $money =DB::table("finances")
            ->select('id')

            ->whereRaw('MONTH(transaction_date) = ?',[$current_month])
            ->orderBy('transaction_date','asc')
            ->get();

        $money_values = [];
        $transaction_date=[];
        $transaction_description=[];
        $trans_money=[];
        foreach($money as $key){
            $transaction_money = Finance::select('money_total','transaction_date','transaction_description','transaction_money')
                ->where('id',$key->id)
                ->orderBy('transaction_date','asc')
                ->get()[0];
            array_push($money_values,$transaction_money->money_total);
            array_push($transaction_date,$transaction_money->transaction_date);
            array_push($transaction_description,$transaction_money->transaction_description );

            array_push($trans_money,$transaction_money->transaction_money );

        }



        $current_month_days=[];
        for($i=1;$i<=31;$i++){
            array_push($current_month_days,$i);
        }



        return  response()->json(["transactions"=>[$money_values,$transaction_date,$current_month_days,$transaction_description,$trans_money]]);
    }

}
