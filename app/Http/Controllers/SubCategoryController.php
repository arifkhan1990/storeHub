<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Resources\SubCategoryResource;
use App\Exceptions\NotFoundException;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        return SubCategoryResource::collection($subCategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'sub_category_name' => 'required|string',
            'sub_category_code' => 'required|string|unique:sub_categories',
            'sub_category_desc' => 'required|string',
            'sub_category_pic' => 'nullable|string',
            'sub_category_status' => 'required|boolean',
        ]);

        $subCategory = SubCategory::create($request->all());
        return new SubCategoryResource($subCategory);
    }

    public function show($id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            throw new NotFoundException('SubCategory not found');
        }
        return new SubCategoryResource($subCategory);
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            throw new NotFoundException('SubCategory not found');
        }

        $request->validate([
            'category_id' => 'required|integer',
            'sub_category_name' => 'required|string',
            'sub_category_code' => 'required|string|unique:sub_categories,sub_category_code,' . $id,
            'sub_category_desc' => 'required|string',
            'sub_category_pic' => 'nullable|string',
            'sub_category_status' => 'required|boolean',
        ]);

        $subCategory->update($request->all());
        return new SubCategoryResource($subCategory);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            throw new NotFoundException('SubCategory not found');
        }

        $subCategory->delete();
        return response()->json(['message' => 'SubCategory deleted successfully'], 204);
    }
}
