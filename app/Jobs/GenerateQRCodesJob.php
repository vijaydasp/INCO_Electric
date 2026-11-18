<?php

namespace App\Jobs;

use App\Models\Qrcode as QrCodeModel;
use App\Models\PdfImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQRCodesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1800;

    public int $point;

    public function __construct($point)
    {
        $this->point = $point;
    }

    public function handle()
    {
        $lastQRCode = QrCodeModel::latest('id')->first();
        $startIndex = $lastQRCode ? $lastQRCode->id + 1 : 1;
        $startData = $lastQRCode ? (int) str_replace('INCO', '', $lastQRCode->data) + 1 : 1;

        $totalCodes = 4500;
        $batchSize = 4500;

        for ($batch = 0; $batch < ceil($totalCodes / $batchSize); $batch++) {
            $data = [];
            $qrCodeBatch = [];

            for ($i = $startIndex; $i < $startIndex + $batchSize; $i++) {
                if ($i > $startIndex + $totalCodes - 1) {
                    break;
                }

                $formattedData = 'INCO' . str_pad($startData, 7, '0', STR_PAD_LEFT);
                $startData++;
                $hashedData = Hash::make($formattedData);

                $qrCodeImage = QrCode::size(150)->generate($hashedData);
                // Save the QR code image as a file
                $fileName = "qr_code_iii_{$i}.svg";
                // $filePath = "qr_codes/{$fileName}"; // This is the absolute path on the server
                $filePath = "uploads/qr_codes/{$fileName}";
                $savedPath = public_path($filePath); // Convert to absolute path for saving

                // Ensure the directory exists
                if (!file_exists(dirname($savedPath))) {
                    mkdir(dirname($savedPath), 0777, true);
                }
                file_put_contents($savedPath, $qrCodeImage);
                // Store the relative path in the database
                $qrCodeBatch[] = [
                    'data' => $hashedData,
                    'image_path' => $filePath,  // Store relative path
                    'point' => $this->point,   // 1 or 2
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $data[] = [
                    'code_data' => $hashedData,
                    'image_path' => public_path($filePath), // Store relative path for PDF generation
                ];
            }

            if (!empty($data)) {
                // $pdf = PDF::loadView('qr_codes_pdf', compact('data'))->setPaper('a3');

                $type = $this->point == 1 ? 'single_point' : 'double_point';
                $pdf = PDF::loadView('qr_codes_pdf', [
                    'data' => $data,
                    'type' => $type,
                ])->setPaper('a3');


                $pdfFileName = "{$type}_qr_codes_set_{$startIndex}_to_" . ($startIndex + $batchSize - 1) . ".pdf";
                // $pdfFileName = "qr_codes_set_" . ($startIndex) . "_to_" . ($startIndex + $batchSize - 1) . ".pdf";

                // Ensure the directory exists for PDFs
                if (!file_exists(public_path('uploads/pdf'))) {
                    mkdir(public_path('uploads/pdf'), 0755, true);
                }

                $pdfFilePath = public_path("uploads/pdf/{$pdfFileName}");  // Path to save the PDF in public/uploads/pdf
                file_put_contents($pdfFilePath, $pdf->output());

                // Store the PDF path in the PdfImage model
                PdfImage::create(['pdf_path' => "uploads/pdf/{$pdfFileName}"]);
            }

            QrCodeModel::insert($qrCodeBatch);
            $startIndex += $batchSize;

            // Optionally clean up QR code files after generating them
            $files = glob(public_path('uploads/qr_codes/*'));
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); // Delete the file
                }
            }
        }
    }
}
