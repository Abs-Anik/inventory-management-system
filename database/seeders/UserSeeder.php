<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->usertype = "Admin";
        $admin->name = "Md. Abu Bakkar";
        $admin->email = "anik@gmail.com";
        $admin->password = Hash::make('123456');
        $admin->is_admin = 1;
        $admin->save();

        $admin = new User();
        $admin->usertype = "User";
        $admin->name = "Mr. Demo";
        $admin->email = "demo@gmail.com";
        $admin->password = Hash::make('123456');
        $admin->is_admin = 0;
        $admin->save();
    }
}
