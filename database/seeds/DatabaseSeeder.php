<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Model::unguard();
         $this->call(RolesSeeder::class);
         $this->call(PermissionsSeeder::class);
         $this->call(UnitsSeeder::class);
         $this->call(ScoutsSeeder::class);
         $this->call(LanguagesSeeder::class);
         $this->call(SettingSeeder::class);
         $this->call(CountrySeeder::class);
        Model::reguard();
    }
}
