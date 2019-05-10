<?php

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
        DB::table('users')->insert([
        	'name'=>'Master',
        	'email'=>'master@gmail.com',
        	'admin'=>'admin',
        	'password'=>bcrypt('12345678')
        ]);
    }
}
