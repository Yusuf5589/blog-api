<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $extraRole = Role::create(['name' => 'extra_role']);

        $permission1 = Permission::create(['name' => 'edit articles']);
        $permission2 = Permission::create(['name' => 'delete articles']);

        $adminRole->givePermissionTo($permission1);
        $adminRole->givePermissionTo($permission2);

        $extraRole->givePermissionTo($permission1);
    }
}

