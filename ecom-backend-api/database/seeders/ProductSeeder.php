<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        Product::truncate();

        $json = File::get('database/data/products.json');
        $products = json_decode($json);

        foreach($products as $product) {
            DB::table('products')->insert([
                'designation' => $product->name,
                'slug' => Str::slug($product->name, '-'),
                'price' => $product->price,
                'discount' => $product->discount,
                'image' => $product->img,
                'note' => $product->note,
                'on_sale' => $product->hasSaleBadge
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
