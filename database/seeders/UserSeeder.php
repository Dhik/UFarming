<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $item){
            DB::table('users')->insert([
                'id' => $item,
                'name' => "name $item",
                'email' => "email $item",
                'profile_picture' => 'dhikri.jpg',
                'password' => "password $item", 
                'active_plant' => $item,
                'location' => "loc $item",
                'username' => "username $item",
            ]);
        }   
    }
}
