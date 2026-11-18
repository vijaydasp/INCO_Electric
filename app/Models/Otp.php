<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Otp extends Model
{
    protected $table = 'otps';

    protected $fillable = [
        'phone', 'otp_code', 'expires_at', 'is_used',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    // Check if OTP is valid (not expired and not used)
    public function isValid()
    {
        return !$this->is_used && Carbon::now()->lt($this->expires_at);
    }

    // Mark OTP as used
    public function markAsUsed()
    {
        $this->is_used = true;
        $this->save();
    }
}
