<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Exceptions\NotFoundException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|integer|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'address' => 'required|string',
            'phone' => 'required|string',
            'active' => 'required|boolean',
            'ban' => 'required|boolean',
            'soft_delete' => 'required|boolean',
            'nid' => 'required|string',
        ]);

        // Hash the password
        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        }

        $user = User::create($request->all());
        return new UserResource($user);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            throw new NotFoundException('User not found');
        }
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            throw new NotFoundException('User not found');
        }

        $request->validate([
            'store_id' => 'required|integer|unique:users,store_id,' . $id,
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required|string',
            'phone' => 'required|string',
            'active' => 'required|boolean',
            'ban' => 'required|boolean',
            'soft_delete' => 'required|boolean',
            'nid' => 'required|string',
        ]);

        // Hash the password if provided
        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        }

        $user->update($request->all());
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            throw new NotFoundException('User not found');
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 204);
    }
}
