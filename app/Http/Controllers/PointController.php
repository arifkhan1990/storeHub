<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Exceptions\NotFoundException;
use App\Http\Resources\PointResource;

class PointsController extends Controller
{
    public function index()
    {
        $points = Point::all();
        return PointResource::collection($points);
    }

    public function store(Request $request)
    {
        $request->validate([
            'point_title' => 'required|string',
            'total_point' => 'required|integer',
            'current_point' => 'required|integer',
            'use_point' => 'required|integer',
            'account_id' => 'required|integer',
            'point_code' => 'required|string',
            'point_status' => 'required|boolean',
        ]);

        $point = Point::create($request->all());
        return new PointResource($point);
    }

    public function show($id)
    {
        $point = Point::find($id);
        if (!$point) {
            throw new NotFoundException('Point not found');
        }
        return new PointResource($point);
    }

    public function update(Request $request, $id)
    {
        $point = Point::find($id);
        if (!$point) {
            throw new NotFoundException('Point not found');
        }

        $request->validate([
            'point_title' => 'required|string',
            'total_point' => 'required|integer',
            'current_point' => 'required|integer',
            'use_point' => 'required|integer',
            'account_id' => 'required|integer',
            'point_code' => 'required|string|unique:points,point_code,' . $id,
            'point_status' => 'required|boolean',
        ]);

        $point->update($request->all());
        return new PointResource($point);
    }

    public function destroy($id)
    {
        $point = Point::find($id);
        if (!$point) {
            throw new NotFoundException('Point not found');
        }

        $point->delete();
        return response()->json(['message' => 'Point deleted successfully'], 204);
    }
}
