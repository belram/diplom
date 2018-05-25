<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create(

        	[
	        	"name" => "admin",
	        	"login" => "admin",
				"email" => "admin@mail.ru",
				'password' => Hash::make('admin'),

        	]

        );
    }
}
