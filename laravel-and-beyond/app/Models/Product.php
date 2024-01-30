<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'products';

    // Define the primary key for the model
    protected $primaryKey = 'id';

    // Define the fillable attributes for the model
    protected $fillable = ['photo', 'title', 'price'];


    // Timestamps
    public $timestamps = true;
}
