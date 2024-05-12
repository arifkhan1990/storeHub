<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Resources\StoreResource;
use App\Exceptions\NotFoundException;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return StoreResource::collection($stores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_code' => 'required|string|unique:stores',
            'store_name' => 'required|string|unique:stores',
            'store_type' => 'required|string',
            'store_desc' => 'nullable|string',
            'created_by' => 'required|integer',
            'store_email' => 'required|array',
            'store_email.*' => 'email',
            'store_physical_address' => 'required|array',
            'store_phone' => 'required|array',
            'fb_page_link' => 'nullable|array',
            'instagram_page_link' => 'nullable|array',
            'tiktok_page_like' => 'nullable|array',
            'linkedin_page_link' => 'nullable|array',
            'store_bio' => 'nullable|string',
            'business_tin' => 'nullable|string',
            'owner_details' => 'required|array',
            'store_status' => 'required|boolean',
            'store_pic' => 'nullable|string',
            'priority' => 'nullable|integer',
            // Add validation rules for other fields
        ]);

        $store = Store::create($request->all());
        return new StoreResource($store);
    }

    public function show($id)
    {
        $store = Store::find($id);
        if (!$store) {
            throw new NotFoundException('Store not found');
        }
        return new StoreResource($store);
    }

    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        if (!$store) {
            throw new NotFoundException('Store not found');
        }

        $request->validate([
            'store_code' => 'required|string|unique:stores',
            'store_name' => 'required|string|unique:stores',
            'store_type' => 'required|string',
            'store_desc' => 'nullable|string',
            'created_by' => 'required|integer',
            'store_email' => 'required|array',
            'store_email.*' => 'email',
            'store_physical_address' => 'required|array',
            'store_phone' => 'required|array',
            'fb_page_link' => 'nullable|array',
            'instagram_page_link' => 'nullable|array',
            'tiktok_page_like' => 'nullable|array',
            'linkedin_page_link' => 'nullable|array',
            'store_bio' => 'nullable|string',
            'business_tin' => 'nullable|string',
            'owner_details' => 'required|array',
            'store_status' => 'required|boolean',
            'store_pic' => 'nullable|string',
            'priority' => 'nullable|integer',
            // Add validation rules for other fields
        ]);

        $store->update($request->all());
        return new StoreResource($store);
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        if (!$store) {
            throw new NotFoundException('Store not found');
        }

        $store->delete();
        return response()->json(['message' => 'Store deleted successfully'], 204);
    }
}
