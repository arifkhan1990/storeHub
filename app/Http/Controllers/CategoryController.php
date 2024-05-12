<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Exceptions\NotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
            'category_code' => 'required|string|unique:categories',
            'category_desc' => 'nullable|string',
            'category_pic' => 'nullable|string',
            'category_status' => 'required|boolean',
        ]);

        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }
        return new CategoryResource($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }

        $request->validate([
            'category_name' => 'required|string',
            'category_code' => 'required|string|unique:categories,category_code,' . $id,
            'category_desc' => 'nullable|string',
            'category_pic' => 'nullable|string',
            'category_status' => 'required|boolean',
        ]);

        $category->update($request->all());
        return new CategoryResource($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new NotFoundException('Category not found');
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 204);
    }
}
