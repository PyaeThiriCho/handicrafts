<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->paginate(12);
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('backend.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
            'actions' => 'nullable|string|max:1000',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        $role->actions = $request->actions;
        $role->save();

        if ($request->filled('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show(Role $role)
    {
        return view('backend.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('backend.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
            'actions' => 'nullable|string|max:1000',
        ]);

        $role->name = $request->name;
        $role->actions = $request->actions;
        $role->save();

        $role->syncPermissions($request->permissions ?: []);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'super-admin') {
            return redirect()->route('roles.index')->with('error', 'Cannot delete super-admin role.');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
