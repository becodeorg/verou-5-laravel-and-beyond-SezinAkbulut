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
    protected $fillable = ['title', 'price', 'photo', 'popular_trend'];

    // Other model code...

    public function getIsPopularTrendAttribute()
    {
        return $this->attributes['popular_trend'];
    }

    // Timestamps
    public $timestamps = true;
}
