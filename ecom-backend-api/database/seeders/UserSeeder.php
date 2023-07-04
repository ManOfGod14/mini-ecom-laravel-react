<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        User::truncate();

        User::create([
            'first_name' => "Client1",
            'last_name' => "Test",
            'username' => "client1",
            'email' => "client1@test.com",
            'password' => bcrypt('123456'),
            'civility_id' => 1,
            'country_id' => 152,
            'city_name' => "Rabat",
            'phone_number' => "0707070707",
        ]);

        User::create([
            'first_name' => "Client2",
            'last_name' => "Test",
            'username' => "client2",
            'email' => "client2@test.com",
            'password' => bcrypt('123456'),
            'civility_id' => 2,
            'country_id' => 152,
            'city_name' => "Casablanca",
            'phone_number' => "0707070707",
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
