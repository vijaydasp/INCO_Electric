<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
     // Specify the table name (optional, since Laravel will assume 'banners')
     protected $table = 'banners';

     // Define the fillable fields for mass assignment
     protected $fillable = ['banner_image'];
}
