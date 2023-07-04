<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Role::truncate();

        Role::create([
            'name' => "Utilisateur",
            'slug' => "utilisateur",
            'description' => "Utilisateur de l'espace d'administration, permissions d'accès limités",
        ]);
        Role::create([
            'name' => "Admin",
            'slug' => "admin",
            'description' => "Admin de l'espace d'administration, peut tout faire, possibilité de restriction",
        ]);
        Role::create([
            'name' => "Root",
            'slug' => "root",
            'description' => "Super admin de l'espace d'administration, peut tout faire, aucune restriction",
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
