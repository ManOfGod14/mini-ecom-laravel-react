<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Currency::truncate();

        $json = File::get("database/data/currencies.json");
        $currencies = json_decode($json);
  
        foreach($currencies as $key => $value) {
            Currency::create([
                'id' => $value->id,
                'name' => $value->name,
                'code' => $value->code,
                'code_num' => $value->code_num,
                'exchange_rate' => $value->exchange_rate,
                'actived' => $value->actived,
                'default' => $value->default
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
