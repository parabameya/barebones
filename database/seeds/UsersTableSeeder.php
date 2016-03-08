<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
	    User::create(array(
	        'name'     => 'Git McClainConcepts',
	        'email'    => 'git@mcclainconcepts.com',
	        'password' => Hash::make('LaravelTestPW'),
	    ));
	    User::create(array(
	        'name'     => 'Ameya Parab',
	        'email'    => 'parab.ameya@gmail.com',
	        'password' => Hash::make('LaravelTestPW'),
	    ));
    }
}
