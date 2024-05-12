<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Resources\CouponResource;
use App\Exceptions\NotFoundException;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return CouponResource::collection($coupons);
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|unique:coupons',
            'store_id' => 'required|integer',
            'benefit' => 'required|json',
            'coupon_expire_date' => 'required|date',
            'coupon_active_date' => 'required|date',
            'coupon_status' => 'required|integer',
        ]);

        $coupon = Coupon::create($request->all());
        return new CouponResource($coupon);
    }

    public function show($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            throw new NotFoundException('Coupon not found');
        }
        return new CouponResource($coupon);
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            throw new NotFoundException('Coupon not found');
        }

        $request->validate([
            'coupon_code' => 'required|string|unique:coupons,coupon_code,' . $id,
            'store_id' => 'required|integer',
            'benefit' => 'required|json',
            'coupon_expire_date' => 'required|date',
            'coupon_active_date' => 'required|date',
            'coupon_status' => 'required|integer',
        ]);

        $coupon->update($request->all());
        return new CouponResource($coupon);
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            throw new NotFoundException('Coupon not found');
        }

        $coupon->delete();
        return response()->json(['message' => 'Coupon deleted successfully'], 204);
    }
}
