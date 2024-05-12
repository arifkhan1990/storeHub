<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Exceptions\NotFoundException;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return PermissionResource::collection($permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'permission_code' => 'required|string|unique:permissions',
            'permission_status' => 'required|boolean',
        ]);

        $permission = Permission::create($request->all());
        return new PermissionResource($permission);
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            throw new NotFoundException('Permission not found');
        }
        return new PermissionResource($permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            throw new NotFoundException('Permission not found');
        }

        $request->validate([
            'title' => 'required|string',
            'permission_code' => 'required|string|unique:permissions,permission_code,' . $id,
            'permission_status' => 'required|boolean',
        ]);

        $permission->update($request->all());
        return new PermissionResource($permission);
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            throw new NotFoundException('Permission not found');
        }

        $permission->delete();
        return response()->json(['message' => 'Permission deleted successfully'], 204);
    }
}
