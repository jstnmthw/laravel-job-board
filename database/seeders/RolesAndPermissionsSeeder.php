<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::query()->firstOrCreate(['name' => 'view user']);
        Permission::query()->firstOrCreate(['name' => 'edit user']);
        Permission::query()->firstOrCreate(['name' => 'update user']);
        Permission::query()->firstOrCreate(['name' => 'delete user']);

        $role = Role::query()->firstOrCreate(['name' => 'user']);
        $role->givePermissionTo('view user');
        $role->givePermissionTo('edit user');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');

        // create demo users
        $user = User::factory()->create();
        $user->assignRole($role);

    }
}
