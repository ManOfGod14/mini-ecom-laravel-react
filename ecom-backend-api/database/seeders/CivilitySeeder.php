<?php

namespace Database\Seeders;

use App\Models\Civility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Civility::truncate();

        Civility::create([
            'name' => "Homme",
            'title' => "Monsieur",
            'title_abbr' => "M.",
            'sex' => "Masculin",
            'sex_abbr' => "M",
            'description' => "Monsieur, est le titre de civilité donné aux hommes."
        ]);

        Civility::create([
            'name' => "Femme",
            'title' => "Madame",
            'title_abbr' => "Mme",
            'sex' => "Féminin",
            'sex_abbr' => "F",
            'description' => "Madame, est le titre de civilité donné aux femmes."
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
