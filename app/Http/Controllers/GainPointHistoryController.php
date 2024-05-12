<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GainPointHistory;
use App\Exceptions\NotFoundException;
use App\Http\Resources\GainPointHistoryResource;

class GainPointHistoryController extends Controller
{
    public function index()
    {
        $histories = GainPointHistory::all();
        return GainPointHistoryResource::collection($histories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'gain_point' => 'required|integer',
            'point_id' => 'required|integer',
        ]);

        $history = GainPointHistory::create($request->all());
        return new GainPointHistoryResource($history);
    }

    public function show($id)
    {
        $history = GainPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Gain point history not found');
        }
        return new GainPointHistoryResource($history);
    }

    public function update(Request $request, $id)
    {
        $history = GainPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Gain point history not found');
        }

        $request->validate([
            'order_id' => 'required|integer',
            'gain_point' => 'required|integer',
            'point_id' => 'required|integer',
        ]);

        $history->update($request->all());
        return new GainPointHistoryResource($history);
    }

    public function destroy($id)
    {
        $history = GainPointHistory::find($id);
        if (!$history) {
            throw new NotFoundException('Gain point history not found');
        }

        $history->delete();
        return response()->json(['message' => 'Gain point history deleted successfully'], 204);
    }
}
