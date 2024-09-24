<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name'
    ];


    public function product()
    {
        return $this->hasmany(Product::class);
    }
}