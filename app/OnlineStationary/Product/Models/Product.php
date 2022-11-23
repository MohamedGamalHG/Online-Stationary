<?php

namespace OnlineStationary\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OnlineStationary\Category\Models\Category;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','details','quantity','price','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
