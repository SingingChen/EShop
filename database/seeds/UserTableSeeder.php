<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'Tony',
            'email'=>'tony@mail.com',
            'password'=>Hash::make('password'),

        ]);

    }
}
