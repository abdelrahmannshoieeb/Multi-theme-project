<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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

    protected $appends = [
        'fullname',
    ];


    public function getFullNameAttribute()  {
        return $this->f_name . " " . $this->l_name;
    }
}
