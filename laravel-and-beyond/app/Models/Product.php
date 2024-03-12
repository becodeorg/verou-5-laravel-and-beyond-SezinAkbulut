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
    protected $fillable = ['title', 'price', 'photo', 'popular_trend', 'category_id'];

    // Other model code...

    public function getIsPopularTrendAttribute()
    {
        return $this->attributes['popular_trend'];
    }

    // Timestamps
    public $timestamps = true;

    public function scopePopularTrend($query)
    {
        return $query->where('popular_trend', true);
    }


   /* public function category()
    {
        return $this->belongsTo(Category::class);
    }


   */
    /*
    public function category()
    {
        return $this->morphTo();
    }

    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function headphones()
    {
        return $this->hasOne(Headphones::class);
    }

    public function smartphones()
    {
        return $this->hasOne(Smartphone::class);
    }

    public function smartwatches()
    {
        return $this->hasOne(Smartwatch::class);
    }

    /*
   public function category()
   {
       return $this->morphTo();
   }
      */

   /*
   public function category()
   {
       return $this->belongsTo(Category::class);
   }
   */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
