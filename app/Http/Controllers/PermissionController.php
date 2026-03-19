<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(12);
        return view('backend.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:permissions,name',
            'actions' => 'nullable|string|max:1000',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        $permission->actions = $request->actions;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function show(Permission $permission)
    {
        return view('backend.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('backend.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:permissions,name,' . $permission->id,
            'actions' => 'nullable|string|max:1000',
        ]);

        $permission->name = $request->name;
        $permission->actions = $request->actions;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
