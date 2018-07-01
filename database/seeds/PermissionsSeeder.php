<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governor = Role::where('name', 'gov')->first();

        $permissions[] = Permission::create([
            'name' => 'users.manage',
            'display_name' => 'Manage Users',
            'description' => 'Manage users and their sessions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'users.activity',
            'display_name' => 'View System Activity Log',
            'description' => 'View activity log for all system users.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'roles.manage',
            'display_name' => 'Manage Roles',
            'description' => 'Manage system roles.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'permissions.manage',
            'display_name' => 'Manage Permissions',
            'description' => 'Manage role permissions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'settings.general',
            'display_name' => 'Update General System Settings',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'languages.languages',
            'display_name' => 'Language manage',
            'description' => 'View languages.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'posts.write',
            'display_name' => 'write posts',
            'description' => 'write posts',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'posts.approve',
            'display_name' => 'approve posts',
            'description' => 'can approve posts',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'posts.edit',
            'display_name' => 'edit posts',
            'description' => 'can edit all posts',
            'removable' => false
        ]);

        $governor->attachPermissions($permissions);
    }
}
