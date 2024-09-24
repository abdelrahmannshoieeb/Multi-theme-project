<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'customer_id',
        'receipt_number',
        'notes',
        'delivery_price',
        'coupon_id',
        'total_price',
        'discount',
        'total_amount',
        'payment_method',
        'payment_status',
        'status',
        'claim_type',
        'claim_at',
    ];

    // Define relationships here if necessary, e.g.
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function items() {
        return $this->hasMany(OrderItems::class,"order_id","id");
    }
}
