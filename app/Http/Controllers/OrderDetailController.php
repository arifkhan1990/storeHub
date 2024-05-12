<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Http\Resources\OrderDetailResource;
use App\Exceptions\NotFoundException;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return OrderDetailResource::collection($orderDetails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'order_details_code' => 'required|string',
            'product_details_id' => 'required|integer',
            'order_details_status' => 'required|boolean',
        ]);

        $orderDetail = OrderDetail::create($request->all());
        return new OrderDetailResource($orderDetail);
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            throw new NotFoundException('Order detail not found');
        }
        return new OrderDetailResource($orderDetail);
    }

    public function update(Request $request, $id)
    {
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            throw new NotFoundException('Order detail not found');
        }

        $request->validate([
            'order_id' => 'required|integer',
            'order_details_code' => 'required|string',
            'product_details_id' => 'required|integer',
            'order_details_status' => 'required|boolean',
        ]);

        $orderDetail->update($request->all());
        return new OrderDetailResource($orderDetail);
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::find($id);
        if (!$orderDetail) {
            throw new NotFoundException('Order detail not found');
        }

        $orderDetail->delete();
        return response()->json(['message' => 'Order detail deleted successfully'], 204);
    }
}
