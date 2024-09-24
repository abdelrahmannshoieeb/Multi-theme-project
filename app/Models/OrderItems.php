<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'product_id',
        'sku_id',
        'branch_id',
        'qty',
        'price',
        'total',
     
    ];


    public function order() {
          return  $this->belongsTo(Order::class);
    }
    public function customer() {
          return  $this->belongsTo(Customer::class);
    }
    public function product() {
          return  $this->belongsTo(Product::class);
    }
    public function skuCode() {
          return  $this->belongsTo(SkuCode::class,"sku_id","id");
    }
    public function branch() {
          return  $this->belongsTo(Branch::class);
    }

}
