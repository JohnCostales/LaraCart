<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Admin
         $user = new User;
         $user->name = "Admin";
         $user->email = "admin@test.com";
         $user->password = bcrypt('secret');
         $user->admin = TRUE;
         $user->save();
    }
}