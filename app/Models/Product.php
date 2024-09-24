<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ["category"];

    protected $casts = [
        'gallery' => 'array',
        'tags' => 'array'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    




    public function skuCodes()
    {
        return $this->hasMany(SkuCode::class, 'product_id');
    }

    public function wishlist()
    
    {
        return $this->hasMany(Wishlist::class);
    }
}
