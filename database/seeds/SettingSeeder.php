<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'app_name' => 'Falah platform',
            'app_title' => 'falah',
            'app_email' => 'houssem.guemer@gmail.com',
            'phone' => '',
            'mobile' => '0667346302',
            'currency' => 'dzd',
            'remember_me' => 'ON',
            'forget_password' => 'ON',
            'notify_signup' => 'OFF',
            're_capcha' => 'OFF',
			'logo' => 'logo.png',			
            'address' => 'Setif,Algeria'
        ]);
    }
}
