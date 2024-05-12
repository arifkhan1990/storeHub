<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPointHistory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
