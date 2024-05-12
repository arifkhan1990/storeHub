<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessPointHistory;
use App\Exceptions\NotFoundException;
use App\Http\Resources\AccessPointHistoryResource;

class AccessPointHistoryController extends Controller
{
    public function index()
    {
        $histories = AccessPointHistory::all();
        return AccessPointHistoryResource::collection($histories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_id' => 'required|integer',
            'order_id' => 'required|integer',
            'access_point' => 'required|integer',
            'point_id' => 'required|integer',
        ]);

        $history = AccessPointHistory::create($request->all());
        return new AccessPointHistoryResource($history);
    }

    public function show($id)
    {
        $history = AccessPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Access point history not found');
        }
        return new AccessPointHistoryResource($history);
    }

    public function update(Request $request, $id)
    {
        $history = AccessPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Access point history not found');
        }

        $request->validate([
            'coupon_id' => 'required|integer',
            'order_id' => 'required|integer',
            'access_point' => 'required|integer',
            'point_id' => 'required|integer',
        ]);

        $history->update($request->all());
        return new AccessPointHistoryResource($history);
    }

    public function destroy($id)
    {
        $history = AccessPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Access point history not found');
        }

        $history->delete();
        return response()->json(['message' => 'Access point history deleted successfully'], 204);
    }
}
