<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->username="sameh";
        $user->age=25;
        $user->password=bcrypt("thamer");
        $user->email="sameh@gmail.com";
        $user->save();
    }
}
