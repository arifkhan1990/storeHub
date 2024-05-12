<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointCurrency;
use App\Exceptions\NotFoundException;
use App\Http\Resources\PointCurrencyResource;

class PointCurrencyController extends Controller
{
    public function index()
    {
        $currencies = PointCurrency::all();
        return PointCurrencyResource::collection($currencies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'point_id' => 'required|integer',
            'point_amount' => 'required|integer',
            'currency_amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $currency = PointCurrency::create($request->all());
        return new PointCurrencyResource($currency);
    }

    public function show($id)
    {
        $currency = PointCurrency::find($id);
        if (!$currency) {
            throw new NotFoundException('Point currency not found');
        }
        return new PointCurrencyResource($currency);
    }

    public function update(Request $request, $id)
    {
        $currency = PointCurrency::find($id);
        if (!$currency) {
            throw new NotFoundException('Point currency not found');
        }

        $request->validate([
            'point_id' => 'required|integer',
            'point_amount' => 'required|integer',
            'currency_amount' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $currency->update($request->all());
        return new PointCurrencyResource($currency);
    }

    public function destroy($id)
    {
        $currency = PointCurrency::find($id);
        if (!$currency) {
            throw new NotFoundException('Point currency not found');
        }

        $currency->delete();
        return response()->json(['message' => 'Point currency deleted successfully'], 204);
    }
}
