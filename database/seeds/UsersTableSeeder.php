<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->username="thamer";
        $user->age=25;
        $user->password=Hash::make("thamer");
        $user->email="thamer@gmail.com";
        $user->save();


        $user=new User;
        $user->username="admin";
        $user->age=25;
        $user->password=Hash::make("admin");
        $user->email="admin@gmail.com";
        $user->is_admin=true;
        $user->save();
    }
}
