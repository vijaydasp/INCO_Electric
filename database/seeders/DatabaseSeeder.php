<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        // Call the seeders
        $this->call(AdminSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(QrSeeder::class);

        // $this->call(TestUserSeeder::class);
    }
}
