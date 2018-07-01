<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
use DB;
use App\Message;
use Auth;
class AppServiceProvider extends ServiceProvider
{
	
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	 
    public function boot()
    {
		if (\Schema::hasTable('settings')) {
			$this->setting();
			$this->language_name();
		}
		
    }
	
	public function setting(){		
		$datasetting = DB::table('settings')->get();
        View::composer('includes.dashbars.topnavbar', 
                    function($view) use($datasetting) {
		                $view->with('settingdata',$datasetting);
                    }
                );
		
	}
    
	public function language_name() {		
		$datalanguages = DB::table('languages')->get();
        View::composer('includes.dashbars.topnavbar', 
                function($view) use($datalanguages) {
		                $view->with('language',$datalanguages);
                    }
                );
	 } 
	 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
