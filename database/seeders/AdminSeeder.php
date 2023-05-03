<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
            'profile' => 'mzn.jpg'
        ]);

        $employe = User::create([
            'name'=>'Employé',
            'email'=>'employe@em.com',
            'password'=>bcrypt('password')
        ]);

        $client = User::create([
            'name'=>'Client',
            'email'=>'client@cl.com',
            'password'=>bcrypt('password')
        ]);


        $admin_role = Role::create(['name' => 'Admin']);
        $employe_role = Role::create(['name' => 'Employé']);
        $client_role = Role::create(['name' => 'Client']);


        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);
        $permission = Permission::create(['name' => 'Post access_status']);

        $permission = Permission::create(['name' => 'Task access']);
        $permission = Permission::create(['name' => 'Task edit']);
        $permission = Permission::create(['name' => 'Task create']);
        $permission = Permission::create(['name' => 'Task delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);

        

        $admin->assignRole($admin_role);
        $employe->assignRole($employe_role);
        $client->assignRole($client_role);



        $admin_role->givePermissionTo(Permission::all());
    }
}
