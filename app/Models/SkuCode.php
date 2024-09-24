<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute; 


class SkuCode extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'code', 'attribute_list','stock_list', 'price', 'minimum', 'maximum'];

    protected $casts = [
        'attribute_list' => 'array',
        'stock_list' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function skuStock()
    {
        return $this->hasMany(SkuStock::class, 'sku_id');
    }


    public function wishlist()
    
    {
        return $this->hasMany(Wishlist::class);
    }


 

   


}
