<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemedProduct extends Model
{
    use HasFactory;

    use HasFactory;

    // Define the table name if it's not plural of the model name
    protected $table = 'redeemed_products';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'product_id',
        'address',
        'status',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
