<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuStock extends Model
{
    use HasFactory;

    protected $fillable = ['sku_id', 'branch_id', 'product_id', 'type', 'count', 'warning'];
    protected $hidden = ['id', 'created_at','updated_at'];
    protected $table = 'sku_stocks';


    public function skuCode()
    {
        return $this->hasMany(SkuCode::class, 'sku_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }





    

}
