<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeOption;
use App\Http\Resources\AttributeOptionResource;
use App\Exceptions\NotFoundException;

class AttributeOptionController extends Controller
{
    public function index()
    {
        $attributeOptions = AttributeOption::all();
        return AttributeOptionResource::collection($attributeOptions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|integer',
            'value' => 'required|string|unique:attribute_options',
        ]);

        $attributeOption = AttributeOption::create($request->all());
        return new AttributeOptionResource($attributeOption);
    }

    public function show($id)
    {
        $attributeOption = AttributeOption::find($id);
        if (!$attributeOption) {
            throw new NotFoundException('Attribute option not found');
        }
        return new AttributeOptionResource($attributeOption);
    }

    public function update(Request $request, $id)
    {
        $attributeOption = AttributeOption::find($id);
        if (!$attributeOption) {
            throw new NotFoundException('Attribute option not found');
        }

        $request->validate([
            'attribute_id' => 'required|integer',
            'value' => 'required|string|unique:attribute_options,value,' . $id,
        ]);

        $attributeOption->update($request->all());
        return new AttributeOptionResource($attributeOption);
    }

    public function destroy($id)
    {
        $attributeOption = AttributeOption::find($id);
        if (!$attributeOption) {
            throw new NotFoundException('Attribute option not found');
        }

        $attributeOption->delete();
        return response()->json(['message' => 'Attribute option deleted successfully'], 204);
    }
}
