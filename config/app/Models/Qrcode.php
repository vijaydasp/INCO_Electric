<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Qrcode extends Model
{
    use HasFactory;
     protected $table = 'qrcodes';

     protected $fillable = [
        'data',
        'image_path',
        'point',
        'status',
        'user_id',
        'scanned_at'
    ];

       protected $casts = [
        'scanned_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
