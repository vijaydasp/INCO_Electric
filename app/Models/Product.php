<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     // Define the table name if it's not plural of the model name
    protected $table = 'products';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'product_info',
        'product_image',
        'point',
    ];

     // Relationship with RedeemedProduct
     public function redeemedProducts()
     {
         return $this->hasMany(RedeemedProduct::class);
     }

     public function notifications()
    {
        return $this->hasMany(Notification::class, 'product_id');
    }
}
