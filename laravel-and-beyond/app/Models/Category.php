<?php
// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'photo'];

    // Define relationship with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

/*
    public function products()
    {
        return $this->morphMany(Product::class, 'category');
    }

    public function products()
    {
        return $this->morphMany(Product::class, 'category', 'category_type', 'category_id');
    }
*/
    /*
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    */
}
