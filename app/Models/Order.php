<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function deliveryInfo()
    {
        return $this->belongsTo(DeliveryInfo::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
