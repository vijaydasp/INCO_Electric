<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    // Define the table name (optional, if you follow Laravel's naming conventions)
    protected $table = 'complaints';

    // Specify the fields that can be mass-assigned
    protected $fillable = ['user_id', 'qr_data', 'action'];

    /**
     * Get the user associated with the complaint.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
