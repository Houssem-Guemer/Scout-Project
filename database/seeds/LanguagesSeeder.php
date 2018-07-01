<?php

use App\Languages;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('languages')->delete();
        Languages::create([
            'id' => '1',
            'foldername' => 'en',
            'languagename' => 'English',
            'description' => 'English',
            'flag_image' => 'america.png'
        ]);

        Languages::create([
            'id' => '2',
            'foldername' => 'ar',
            'languagename' => 'Arabic',
            'description' => 'Arabic best language in the world',
            'flag_image' => 'algeria.png'
        ]);
		
		Languages::create([
            'id' => '22',
            'foldername' => 'bn',
            'languagename' => 'bengali',
            'description' => 'Bangla',
            'flag_image' => '1475429828.png'
        ]);
    }
}
