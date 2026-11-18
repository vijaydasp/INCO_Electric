<?php

namespace Database\Seeders;

use App\Models\Qrcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Loop to create 103500 QR codes
         for ($i = 1; $i <= 103500; $i++) {
            // Generate the QR code data
            $data = 'INCO' . str_pad($i, 7, '0', STR_PAD_LEFT); // INCO0000001, INCO0000002, etc.

            // Generate the image file name and path
            $fileName = "qr_code_{$i}.svg";
            $filePath = "qr_codes/{$fileName}";

            // Create a new record in the database
            Qrcode::create([
                'data' => $data,
                'image_path' => $filePath,
                'status' => false, // Set status to false by default
                'user_id' => null, // Set user_id to null by default
            ]);
        }
    }
}
