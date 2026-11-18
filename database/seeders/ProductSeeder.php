<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_info' => 'Backpack',
                'product_image' => 'products/bag.jpg', // Assuming images are stored in 'products' folder
                'point' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_info' => 'Iron box',
                'product_image' => 'products/ironbox.jpg',
                'point' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_info' => 'Dinner set',
                'product_image' => 'products/dinnerset.jpg',
                'point' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
