<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    // مهم: اسم الكلاس فيه Underscore (Product_Size)، فـ Eloquent هيحاول
    // يخمّن اسم الجدول ويطلع غلط (product__sizes بـ underscore زيادة).
    // حدد اسم الجدول صراحة عشان تتجنب المشكلة دي:
    protected $table = 'product_sizes';

    protected $fillable = [
        'product_id',
        'size_key',
        'label_en',
        'label_ar',
        'price',
        'sort_order',
        'active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
