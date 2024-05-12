<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointCurrency extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
