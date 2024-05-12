<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Exceptions\NotFoundException;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string',
            'store_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'order_details_id' => 'required|integer',
            'total' => 'required|integer',
            'discount' => 'required|numeric',
            'coupon_id' => 'required|integer',
            'delivery_id' => 'required|integer',
            'account_id' => 'required|integer',
            'order_status' => 'required|integer',
        ]);

        $order = Order::create($request->all());
        return new OrderResource($order);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) {
            throw new NotFoundException('Order not found');
        }
        return new OrderResource($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            throw new NotFoundException('Order not found');
        }

        $request->validate([
            'order_code' => 'required|string',
            'store_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'order_details_id' => 'required|integer',
            'total' => 'required|integer',
            'discount' => 'required|numeric',
            'coupon_id' => 'required|integer',
            'delivery_id' => 'required|integer',
            'account_id' => 'required|integer',
            'order_status' => 'required|integer',
        ]);

        $order->update($request->all());
        return new OrderResource($order);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            throw new NotFoundException('Order not found');
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 204);
    }
}
