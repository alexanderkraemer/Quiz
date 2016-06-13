<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'alex';
        $user->email = 'office@alexanderkraemer.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
