<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Resources\BrandResource;
use App\Exceptions\NotFoundException;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return BrandResource::collection($brands);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'brand_name' => 'required|string',
            'brand_code' => 'required|string|unique:brands',
            'brand_desc' => 'nullable|string',
            'brand_pic' => 'nullable|string',
            'brand_type' => 'nullable|string',
            'brand_status' => 'boolean',
            // Add validation rules for other fields
        ]);

        $brand = Brand::create($request->all());
        return new BrandResource($brand);
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            throw new NotFoundException('Brand not found');
        }
        return new BrandResource($brand);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            throw new NotFoundException('Brand not found');
        }

        $request->validate([
            'category_id' => 'required|integer',
            'brand_name' => 'required|string',
            'brand_code' => 'required|string|unique:brands,brand_code,' . $id,
            'brand_desc' => 'nullable|string',
            'brand_pic' => 'nullable|string',
            'brand_type' => 'nullable|string',
            'brand_status' => 'boolean',
            // Add validation rules for other fields
        ]);

        $brand->update($request->all());
        return new BrandResource($brand);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            throw new NotFoundException('Brand not found');
        }

        $brand->delete();
        return response()->json(['message' => 'Brand deleted successfully'], 204);
    }
}
