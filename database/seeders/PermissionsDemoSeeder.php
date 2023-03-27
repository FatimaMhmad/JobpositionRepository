<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
//----------1-------------------------
        // create permissions
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'edit companies']);
        Permission::create(['name' => 'delete companies']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin1']);

        $role1->givePermissionTo('create companies');
        $role1->givePermissionTo('edit companies');
        $role1->givePermissionTo('delete companies');

        // create demo users
        $admin1 = User::create([
            'name'  => 'admin1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password') ,
            'remember_token'    => Str::random(10),
        ]);

        $admin1->assignRole($role1);

//--------------2-----------------------
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'edit cities']);
        Permission::create(['name' => 'delete cities']);

        $role2 = Role::create(['name' => 'admin2']);

        $role2->givePermissionTo('create cities');
        $role2->givePermissionTo('edit cities');
        $role2->givePermissionTo('delete cities');

        $admin2 = User::create([
            'name'  => 'admin2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password') ,
            'remember_token'    => Str::random(10),
        ]);

        $admin2->assignRole($role2);

//-------------------3------------------------
                Permission::create(['name' => 'create specializations']);
                Permission::create(['name' => 'edit specializations']);
                Permission::create(['name' => 'delete specializations']);

                $role3 = Role::create(['name' => 'admin3']);

                $role3->givePermissionTo('create specializations');
                $role3->givePermissionTo('edit specializations');
                $role3->givePermissionTo('delete specializations');

                $admin3 = User::create([
                    'name'  => 'admin3',
                    'email' => 'admin3@gmail.com',
                    'email_verified_at' => now(),
                    'password'          => Hash::make('password') ,
                    'remember_token'    => Str::random(10),
                ]);

                $admin3->assignRole($role3);
//--------------------------------------------------4-------------
                Permission::create(['name' => 'create job_positions']);
                Permission::create(['name' => 'edit job_positions']);
                Permission::create(['name' => 'delete job_positions']);
                $role4 = Role::create(['name' => 'admin4']);
                $role4->givePermissionTo('create job_positions');
                $role4->givePermissionTo('edit job_positions');
                $role4->givePermissionTo('delete job_positions');

                $admin4 = User::create([
                    'name'  => 'admin4',
                    'email' => 'admin4@gmail.com',
                    'email_verified_at' => now(),
                    'password'          => Hash::make('password') ,
                    'remember_token'    => Str::random(10),
                ]);

                $admin4->assignRole($role4);

                //----------------------------------------5----------------
            Permission::create(['name' => 'create userrequests']);
            Permission::create(['name' => 'edit userrequests']);
            Permission::create(['name' => 'delete userrequests']);

            $role5 = Role::create(['name' => 'admin5']);

            $role5->givePermissionTo('create userrequests');
            $role5->givePermissionTo('edit userrequests');
            $role5->givePermissionTo('delete userrequests');

            $admin5 = User::create([
                'name'  => 'admin5',
                'email' => 'admin5@gmail.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password') ,
                'remember_token'    => Str::random(10),
            ]);

            $admin5->assignRole($role5);
    }
}
