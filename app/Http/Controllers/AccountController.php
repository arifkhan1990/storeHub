<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return response()->json($accounts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer',
            'user_name' => 'required|string|unique:accounts',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|string',
        ]);
        // Hash the password
        $request['password'] = Hash::make($request['password']);

        $account = Account::create($request->all());
        return response()->json($account, 201);
    }

    public function show($id)
    {
        $account = Account::find($id);
        if (!$account) {
            throw new NotFoundException('Account not found');
        }
        return response()->json($account);
    }

    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        if (!$account) {
            throw new NotFoundException('Account not found');
        }

        $request->validate([
            'user_id' => 'required|integer',
            'role_id' => 'required|integer',
            'user_name' => 'required|string|unique:accounts,user_name,' . $id,
            'email' => 'required|email|unique:accounts,email,' . $id,
            'password' => 'required|string',
        ]);

        $account->update($request->all());
        return response()->json($account);
    }

    public function destroy($id)
    {
        $account = Account::find($id);
        if (!$account) {
            throw new NotFoundException('Account not found');
        }

        $account->delete();
        return response()->json(null, 204);
    }
}
