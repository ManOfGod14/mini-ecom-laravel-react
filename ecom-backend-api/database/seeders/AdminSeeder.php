<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Admin::truncate();

        Admin::create([
            'role_id' => 1,
            'first_name' => "User",
            'last_name' => "Test",
            'username' => "user",
            'email' => "user@test.com",
            'password' => bcrypt('123456'),
            'civility_id' => 2,
            'country_id' => 152,
            'city_name' => "Casablanca",
            'phone_number' => "0707070707",
        ]);

        Admin::create([
            'role_id' => 2,
            'first_name' => "Admin",
            'last_name' => "Test",
            'username' => "admin",
            'email' => "admin@test.com",
            'password' => bcrypt('123456'),
            'civility_id' => 1,
            'country_id' => 152,
            'city_name' => "Casablanca",
            'phone_number' => "0707070707",
        ]);

        Admin::create([
            'role_id' => 3,
            'first_name' => "Root",
            'last_name' => "Test",
            'username' => "root",
            'email' => "root@test.com",
            'password' => bcrypt('123456'),
            'civility_id' => 1,
            'country_id' => 152,
            'city_name' => "Casablanca",
            'phone_number' => "0707070707",
        ]);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
