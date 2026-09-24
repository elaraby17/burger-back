<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer_Product extends Model
{
    protected $table = 'offer_products';

    public $timestamps = false;

    protected $fillable = [
        'offer_id',
        'product_id',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
