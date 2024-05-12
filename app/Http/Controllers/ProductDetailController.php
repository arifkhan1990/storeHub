<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Http\Resources\ProductDetailResource;
use App\Exceptions\NotFoundException;

class ProductDetailController extends Controller
{
    public function index()
    {
        $productDetails = ProductDetail::all();
        return ProductDetailResource::collection($productDetails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'product_details_code' => 'required|string',
            'product_desc' => 'required|string',
            'product_pic' => 'required|array',
            'product_color' => 'required|array',
            'product_size' => 'required|array',
            'product_price' => 'required|array',
            'product_status' => 'required|boolean',
            'variants' => 'required|array',
            'stock' => 'integer',
            'stock_status' => 'required|integer',
        ]);

        $productDetail = ProductDetail::create($request->all());
        return new ProductDetailResource($productDetail);
    }

    public function show($id)
    {
        $productDetail = ProductDetail::find($id);
        if (!$productDetail) {
            throw new NotFoundException('Product Detail not found');
        }
        return new ProductDetailResource($productDetail);
    }

    public function update(Request $request, $id)
    {
        $productDetail = ProductDetail::find($id);
        if (!$productDetail) {
            throw new NotFoundException('Product Detail not found');
        }

        $request->validate([
            'product_id' => 'required|integer',
            'product_details_code' => 'required|string',
            'product_desc' => 'required|string',
            'product_pic' => 'required|array',
            'product_color' => 'required|array',
            'product_size' => 'required|array',
            'product_price' => 'required|array',
            'product_status' => 'required|boolean',
            'variants' => 'required|array',
            'stock' => 'integer',
            'stock_status' => 'required|integer',
        ]);

        $productDetail->update($request->all());
        return new ProductDetailResource($productDetail);
    }

    public function destroy($id)
    {
        $productDetail = ProductDetail::find($id);
        if (!$productDetail) {
            throw new NotFoundException('Product Detail not found');
        }

        $productDetail->delete();
        return response()->json(['message' => 'Product Detail deleted successfully'], 204);
    }
}
