<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Resources\VendorResource;
use App\Exceptions\NotFoundException;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return VendorResource::collection($vendors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|integer',
            'vendor_name' => 'required|string',
            'vendor_code' => 'required|string|unique:vendors,vendor_code',
            'vendor_desc' => 'required|string',
            'vendor_pic' => 'required|string',
            'vendor_details' => 'required|json',
            'vendor_status' => 'required|boolean',
        ]);

        $vendor = Vendor::create($request->all());
        return new VendorResource($vendor);
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            throw new NotFoundException('Vendor not found');
        }
        return new VendorResource($vendor);
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            throw new NotFoundException('Vendor not found');
        }

        $request->validate([
            'store_id' => 'required|integer',
            'vendor_name' => 'required|string',
            'vendor_code' => 'required|string|unique:vendors,vendor_code,' . $id,
            'vendor_desc' => 'required|string',
            'vendor_pic' => 'required|string',
            'vendor_details' => 'required|json',
            'vendor_status' => 'required|boolean',
        ]);
        $vendor->update($request->all());
        return new VendorResource($vendor);
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            throw new NotFoundException('Vendor not found');
        }

        $vendor->delete();
        return response()->json(['message' => 'Vendor deleted successfully'], 204);
    }
}
