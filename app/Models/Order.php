<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\User;
use App\Models\Branch;
use App\Models\OrderItem;
use App\Models\Order_Status_History;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistory()
    {
        return $this->hasMany(Order_Status_History::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
