<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Resources\AttributeResource;
use App\Exceptions\NotFoundException;

class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return AttributeResource::collection($attributes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:attributes',
        ]);

        $attribute = Attribute::create($request->all());
        return new AttributeResource($attribute);
    }

    public function show($id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            throw new NotFoundException('Attribute not found');
        }
        return new AttributeResource($attribute);
    }

    public function update(Request $request, $id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            throw new NotFoundException('Attribute not found');
        }

        $request->validate([
            'name' => 'required|string|unique:attributes,name,' . $id,
        ]);

        $attribute->update($request->all());
        return new AttributeResource($attribute);
    }

    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
            throw new NotFoundException('Attribute not found');
        }

        $attribute->delete();
        return response()->json(['message' => 'Attribute deleted successfully'], 204);
    }
}
