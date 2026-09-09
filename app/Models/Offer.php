<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];
    public function includedProducts()
    {
        return $this->belongsToMany(Product::class, 'offer_products');
    }
}
