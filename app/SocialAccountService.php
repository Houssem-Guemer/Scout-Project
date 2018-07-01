<?php

namespace App;

use Laravel\Socialite\Contracts\Provider;
use DB;
class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);
         $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {

           $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
       $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                 $email = $providerUser->getEmail();
                if(!empty( $email)){  
				/* social data insert */
                $user = User::create([
                   'email' => $providerUser->getEmail(),
                    'username' => $providerUser->getEmail(),
                    'first_name' => $providerUser->getName(),
					'role' => 'User',
                    'status' => "Active",
                ]);
				$insertedId = $user->id;
		      DB::table('role_user')->insert(['user_id' => $insertedId, 'role_id' => 2]);
            }else{
			/* social data insert if email empty */
			   $user = User::create([
                   'email' => $providerUser->getNickname().'@twitter.com',
                    'username' => $providerUser->getNickname(),
                    'first_name' => $providerUser->getName(),
					'role' => 'User',
					'status' => "Active",
                ]);	
					$insertedId = $user->id;
		      DB::table('role_user')->insert(['user_id' => $insertedId, 'role_id' => 2]);
			}
			}
            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

}
