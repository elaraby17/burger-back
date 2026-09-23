<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'icon',
        'active',
        'order',
    ];
}
