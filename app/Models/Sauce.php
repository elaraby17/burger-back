<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    protected $fillable = [
        'name',
        'description',
        'spiciness_level',
    ];
}
