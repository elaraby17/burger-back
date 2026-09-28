<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $falbala = [
        'name_en',
        'name_ar',
        'phone',
        'governorate',
        'area',
        'active',
        'address',
        'latitude',
        'longitude',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
