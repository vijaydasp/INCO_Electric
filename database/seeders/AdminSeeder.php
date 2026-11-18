<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                   // First admin
        User::create([
            'name' => 'Admin1',
            'email' => 'veekayharidas@yahoo.com',
            'password' => Hash::make('Incoadmin1@123'),
            'phone'=>'9495101717',
            'status' => 'active',
            'role' => 'admin',
        ]);

        // Second admin
        User::create([
            'name' => 'Admin2',
            'email' => 'Akshayrajakshay3005@gmail.com',
            'password' => Hash::make('Incoadmin2@123'),
            'phone'=>'9207193005',
            'status' => 'active',
            'role' => 'admin',
        ]);

        //  // Test admin
        //  User::create([
        //     'name' => 'testAdmin',
        //     'email' => 'testadmin@gmail.com',
        //     'password' => Hash::make('Testadmin@123'),
        //     'phone'=>'7356350093',
        //     'status' => 'active',
        //     'role' => 'admin',
        // ]);
        
    }
}
