<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'status',
        'gender',
        'wallet',
        'points',
    ];

    protected $hidden = [
        'password',
    ];
}
