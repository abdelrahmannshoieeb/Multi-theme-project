<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $casts =[
      'btnUrl' =>'string'  
    ];
    protected $appends =[
      'url'  
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }


        public function getUrlAttribute()
        {
            return  asset('storage/'.$this->image);
        }


      




}
