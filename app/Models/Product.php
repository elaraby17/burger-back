<?php

namespace App\Models;
use App\Models\Product_Size;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\Sauce;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
    'category_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'image', 'price', 'slug', 'is_new', 'active', 'popular', 'order'
];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->hasMany(Product_Size::class);
    }

    public function sauces()
    {
        return $this->belongsToMany(Sauce::class, 'product_sauces');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
