<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function gainPointHistory()
    {
        return $this->hasMany(GainPointHistory::class);
    }

    public function accessPointHistory()
    {
        return $this->hasMany(AccessPointHistory::class);
    }

    public function pointCurrency()
    {
        return $this->hasOne(PointCurrency::class);
    }
}
