<?php

namespace App\Models;

use App\Models\Banner;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'image',
        'isActive'
    ];


    protected $appends = [
        'parent',
        "child",
        'fullname',
    ];


    protected $withCount = ["products"];
    protected $with = ["banner"];


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id',"id");
    }


    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParentAttribute()
    {
        return Category::where("id", $this->parent_id)->first()->name ?? "";
    }
    public function getChildAttribute()
    {
        return Category::where("parent_id", $this->id)->first()->name ?? "";
    }


    public function getFullNameAttribute()
    {



        if ($this->parent) {
         

            return $this->parent . " > " . $this->name ;

        } else {
            return  $this->name;
        }
    }



    public function banner()
    {
        return $this->hasOne(Banner::class);
    }


    public function product()
    {
        return $this->hasmany(Product::class);
    }
}
