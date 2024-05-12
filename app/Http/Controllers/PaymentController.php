<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Exceptions\NotFoundException;
use App\Http\Resources\PaymentResource;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return PaymentResource::collection($payments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_code' => 'required|string|unique:payments',
            'store_id' => 'required|integer',
            'payment_type' => 'required|string',
            'payment_details' => 'required|array',
            'payment_status' => 'required|boolean',
        ]);

        $payment = Payment::create($request->all());
        return new PaymentResource($payment);
    }

    public function show($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            throw new NotFoundException('Payment not found');
        }
        return new PaymentResource($payment);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            throw new NotFoundException('Payment not found');
        }

        $request->validate([
            'payment_code' => 'required|string|unique:payments,payment_code,' . $id,
            'store_id' => 'required|integer',
            'payment_type' => 'required|string',
            'payment_details' => 'required|array',
            'payment_status' => 'required|boolean',
        ]);

        $payment->update($request->all());
        return new PaymentResource($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            throw new NotFoundException('Payment not found');
        }

        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully'], 204);
    }
}
