<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryInfo;
use App\Http\Resources\DeliveryInfoResource;
use App\Exceptions\NotFoundException;

class DeliveryInfoController extends Controller
{
    public function index()
    {
        $deliveryInfos = DeliveryInfo::all();
        return DeliveryInfoResource::collection($deliveryInfos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'delivery_location' => 'required|array',
            'delivery_receiver' => 'required|string',
            'receiver_phone' => 'required|string',
            'sending_time' => 'required|date',
            'receiving_time' => 'required|date',
            'delivery_status' => 'required|integer',
            'delivery_code' => 'required|string',
            'delivery_service_provider_id' => 'required|integer',
            'delivery_charge' => 'required|numeric',
        ]);

        $deliveryInfo = DeliveryInfo::create($request->all());
        return new DeliveryInfoResource($deliveryInfo);
    }

    public function show($id)
    {
        $deliveryInfo = DeliveryInfo::find($id);
        if (!$deliveryInfo) {
            throw new NotFoundException('Delivery info not found');
        }
        return new DeliveryInfoResource($deliveryInfo);
    }

    public function update(Request $request, $id)
    {
        $deliveryInfo = DeliveryInfo::find($id);
        if (!$deliveryInfo) {
            throw new NotFoundException('Delivery info not found');
        }

        $request->validate([
            'order_id' => 'required|integer',
            'delivery_location' => 'required|array',
            'delivery_receiver' => 'required|string',
            'receiver_phone' => 'required|string',
            'sending_time' => 'required|date',
            'receiving_time' => 'required|date',
            'delivery_status' => 'required|integer',
            'delivery_code' => 'required|string',
            'delivery_service_provider_id' => 'required|integer',
            'delivery_charge' => 'required|numeric',
        ]);

        $deliveryInfo->update($request->all());
        return new DeliveryInfoResource($deliveryInfo);
    }

    public function destroy($id)
    {
        $deliveryInfo = DeliveryInfo::find($id);
        if (!$deliveryInfo) {
            throw new NotFoundException('Delivery info not found');
        }

        $deliveryInfo->delete();
        return response()->json(['message' => 'Delivery info deleted successfully'], 204);
    }
}
