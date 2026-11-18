<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class BannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('banners')->insert([
            [
                'banner_image' => 'banners/banner1.jpg', // Assuming the images are stored in 'banners' folder
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner_image' => 'banners/banner7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);

        
    }
}
