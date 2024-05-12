<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryServiceProvider;
use App\Exceptions\NotFoundException;
use App\Http\Resources\DeliveryServiceProviderResource;

class DeliveryServiceProviderController extends Controller
{
    public function index()
    {
        $providers = DeliveryServiceProvider::all();
        return DeliveryServiceProviderResource::collection($providers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_code' => 'required|string|unique:delivery_service_providers',
            'store_id' => 'required|integer',
            'provider_details' => 'required|array',
            'provider_status' => 'required|boolean',
        ]);

        $provider = DeliveryServiceProvider::create($request->all());
        return new DeliveryServiceProviderResource($provider);
    }

    public function show($id)
    {
        $provider = DeliveryServiceProvider::find($id);
        if (!$provider) {
            throw new NotFoundException('Delivery service provider not found');
        }
        return new DeliveryServiceProviderResource($provider);
    }

    public function update(Request $request, $id)
    {
        $provider = DeliveryServiceProvider::find($id);
        if (!$provider) {
            throw new NotFoundException('Delivery service provider not found');
        }

        $request->validate([
            'provider_code' => 'required|string|unique:delivery_service_providers,provider_code,' . $id,
            'store_id' => 'required|integer',
            'provider_details' => 'required|array',
            'provider_status' => 'required|boolean',
        ]);

        $provider->update($request->all());
        return new DeliveryServiceProviderResource($provider);
    }

    public function destroy($id)
    {
        $provider = DeliveryServiceProvider::find($id);
        if (!$provider) {
            throw new NotFoundException('Delivery service provider not found');
        }

        $provider->delete();
        return response()->json(['message' => 'Delivery service provider deleted successfully'], 204);
    }
}
