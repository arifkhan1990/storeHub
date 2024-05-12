<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Exceptions\NotFoundException;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'point_title' => 'required|string',
            'total_point' => 'required|integer',
            'current_point' => 'required|integer',
            'use_point' => 'required|integer',
            'account_id' => 'required|integer|exists:accounts,id',
            'point_code' => 'required|string',
            'point_status' => 'required|integer',
        ]);

        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            throw new NotFoundException('Product not found');
        }
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            throw new NotFoundException('Product not found');
        }

        $request->validate([
            'point_title' => 'required|string',
            'total_point' => 'required|integer',
            'current_point' => 'required|integer',
            'use_point' => 'required|integer',
            'account_id' => 'required|integer|exists:accounts,id',
            'point_code' => 'required|string',
            'point_status' => 'required|integer',
        ]);

        $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            throw new NotFoundException('Product not found');
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }
}
