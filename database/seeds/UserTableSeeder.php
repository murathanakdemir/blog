<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=> "Murathan Akdemir",
            "email"=> "murathnakdemir@gmail.com",
            "password"=> bcrypt("Murathan67")
        ]);

        DB::table('role_user')->insert(['role_id'=>1 , 'user_id'=>1]);
        DB::table('role_user')->insert(['role_id'=>2 , 'user_id'=>1]);
        DB::table('role_user')->insert(['role_id'=>3 , 'user_id'=>1]);
    }
}
