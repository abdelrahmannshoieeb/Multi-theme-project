<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'phone',
        'image',
        'status',
    ];

    public function skuStocks()
    {
        return $this->hasMany(SkuStock::class, 'sku_id');
    }


}
