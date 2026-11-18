<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details'; // Ensure it uses the 'details' table

    protected $fillable = [
        'user_id',
        'place',
        'city',
        'district',
        'pincode',
        'profile',
        'point'
    ];

    // Define the one-to-one relationship with the User model


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
