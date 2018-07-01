<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'gov',
            'display_name' => 'roles.gov',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vgov',
            'display_name' => 'roles.vgov',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'med',
            'display_name' => 'roles.med',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vmed',
            'display_name' => 'roles.vmed',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'fin',
            'display_name' => 'roles.fin',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vfin',
            'display_name' => 'roles.vfin',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'psv',
            'display_name' => 'roles.psv',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vpsv',
            'display_name' => 'roles.vpsv',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'ucap',
            'display_name' => 'roles.ucap',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vucp',
            'display_name' => 'roles.vucp',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'capa',
            'display_name' => 'roles.capa',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'trne',
            'display_name' => 'roles.trne',
            'description' => '',
            'removable' => false
        ]);
    }
}
