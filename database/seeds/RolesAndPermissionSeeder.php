<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Administrator;
class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset Cache roles and Permission
        app()['cache']->forget('spatie.permission.cache');

        //Create Permissions
        Permission::create(['name' => 'Privilege Management','guard_name' => 'admin']);
        Permission::create(['name' => 'Admin Management','guard_name' => 'admin']);
        Permission::create(['name' => 'Add Admin','guard_name' => 'admin']);
        Permission::create(['name' => 'Patient Management','guard_name' => 'doctor']);
        Permission::create(['name' => 'Doctor Management','guard_name' => 'patient']);

        //Create roles and assign existing permissions
        $role = Role::create(['name' => 'Developer','guard_name' => 'admin']);
        $role->givePermissionTo('Privilege Management');
        $role->givePermissionTo('Admin Management');
        $role2 = Role::create(['name' => 'Doctor','guard_name' => 'doctor']);
        $role3 = Role::create(['name' => 'Patient','guard_name' => 'patient']);
        $role2->givePermissionTo('Patient Management');
        $role3->givePermissionTo('Doctor Management');

        $role = Role::create(['name' => 'Super Admin','guard_name' => 'admin']);
        $role->givePermissionTo('Admin Management');

    }
}
