<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test user1',
                'email' => 'testuser1@gmail.com',
                'phone' => '9995518067',
                'password' => Hash::make('Test123'),
                'role' => 'user',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);

        // Get the IDs of the inserted users
        $test1 = DB::table('users')->where('email', 'testuser1@gmail.com')->value('id');
        $test2 = DB::table('users')->where('email', 'testuser2@gmail.com')->value('id');
        $test3 = DB::table('users')->where('email', 'testuser3@gmail.com')->value('id');

        // Insert user details for each user
        DB::table('user_details')->insert([
            [
                'user_id' => $test1,
                'place' => 'New York',
                'city' => 'New York City',
                'district' => 'Kozhikode',
                'pincode' => '100011',
                'profile' => null,
                'point' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    
    }
}
