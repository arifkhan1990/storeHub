<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Exceptions\NotFoundException;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string',
            'role_code' => 'required|string',
            'role_status' => 'required|boolean',
        ]);

        $role = Role::create($request->all());
        return new RoleResource($role);
    }

    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            throw new NotFoundException('Role not found');
        }
        return new RoleResource($role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            throw new NotFoundException('Role not found');
        }

        $request->validate([
            'role_name' => 'required|string',
            'role_code' => 'required|string',
            'role_status' => 'required|boolean',
        ]);

        $role->update($request->all());
        return new RoleResource($role);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
            throw new NotFoundException('Role not found');
        }

        $role->delete();
        return response()->json(['message' => 'Role deleted successfully'], 204);
    }
}
