<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::insert([

        	[
        		'name' => 'Creative Shiper',
		        'email' => 'crative@gmail.com',
		        'email_verified_at' => now(),
		        'password' => bcrypt('12345678'),
		        'role_id' => 1
        	],

        	[
        		'name' => 'Rasel Hossain',
		        'email' => 'bdraseltech@gmail.com',
		        'email_verified_at' => now(),
		        'password' => bcrypt('12345678'),
		        'role_id' => 4
        	]

        ]);
    }
}
