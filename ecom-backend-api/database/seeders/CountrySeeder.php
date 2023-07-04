<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Country::truncate();

        $json = File::get("database/data/countries.json");
        $countries = json_decode($json);
  
        foreach($countries as $key => $value) {
            Country::create([
                'id' => $value->id,
                'name' => $value->name,
                'iso_code2' => $value->iso_code,
                'call_prefix' => $value->call_prefix,
                'currency_id' => $value->currency_id,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
