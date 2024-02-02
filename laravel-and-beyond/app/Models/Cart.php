<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'product_type', 'quantity','photo'];

    // Define relationships if needed, e.g., belongsTo User, belongsTo Product

    // Example relationship with a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Example relationship with a Product
    public function product()
    {
        // Assuming you have a Product model
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
