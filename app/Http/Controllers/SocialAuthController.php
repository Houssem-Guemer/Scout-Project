<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use App\Foo;

class SocialAuthController extends Controller
{
	
	protected $foo;
     public function redirect($provider)
     {
         return Socialite::driver($provider)->redirect();
    }

   public function callback(SocialAccountService $service, $provider,Foo $foo)
	{
		 $this->foo = $foo;
		// Important change from previous post is that I'm now passing
		// whole driver, not only the user. So no more ->user() part
		$user = $service->createOrGetUser(Socialite::driver($provider));

		auth()->login($user);
		$description = array('description'=>'Loged in.');
		$this->foo->users_activity($description);
		return redirect()->to('/dashboard');
	}
}