<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ADMIN ROLE
         */
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        /**
         * USER ROLE
         */
        $userRole = new Role();
        $userRole->name = 'member';
        $userRole->display_name = 'Member';
        $userRole->save();
        /**
         * ADMIN DATA
         */
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@sample.com';
        $admin->telepon = '085887755';
        $admin->provinsi = 'JAWA BARAT';
        $admin->alamat = '-';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->attachRole($adminRole);
        /**
         * USER DATA
         */
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@sample.com';
        $user->telepon = '085887756';
        $user->provinsi = 'JAWA BARAT';
        $user->alamat = '-';
        $user->password = bcrypt('password');
        $user->save();
        $user->attachRole($userRole);
    }
}
