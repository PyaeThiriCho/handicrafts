<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;   
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function index()
    {
        // 1. Fetch users and admins along with their Spatie roles and permissions
        $users = User::with('roles.permissions')->get();
        $admins = Admin::with('roles.permissions')->get();

        // 2. Merge both models into a single collection and order by newest first
        $allAccounts = $users->concat($admins)->sortByDesc('created_at');

        // 3. Paginate the combined collection manually (10 items per page)
        $currentPage = request()->get('page', 1);
        $perPage = 10;

        $users = new LengthAwarePaginator(
            $allAccounts->slice(($currentPage - 1) * $perPage, $perPage)->values(),
            $allAccounts->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        
        return view('backend.users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email|unique:admins,email',
            'password'    => 'required|min:8|confirmed',
            'role'        => 'required',
            'permissions' => 'nullable|array',
        ]);

        $roleModel = Role::where('name', $request->role)->first();

        // IF ROLE IS ADMIN -> SAVE TO 'admins' TABLE
        if (strtolower($request->role) === 'admin') {
            
            $admin = Admin::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Assign Spatie Role
            if ($roleModel) {
                $admin->assignRole($roleModel); 
            }

            // Assign Direct Permissions if selected
            if ($request->has('permissions')) {
                $admin->givePermissionTo($request->permissions);
            }

        } else {
            
            // SAVE TO 'users' TABLE
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Assign Spatie Role
            if ($roleModel) {
                $user->assignRole($roleModel);
            }

            // Assign Direct Permissions if selected
            if ($request->has('permissions')) {
                $user->givePermissionTo($request->permissions);
            }

        }

        return redirect()->route('users.index')
            ->with('success', 'Account created successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id) ?? Admin::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        
        return view('backend.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function show($id)
    {
        $user = User::find($id) ?? Admin::findOrFail($id);
        
        return view('backend.users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,'.$id.'|unique:admins,email,'.$id,
            'password'    => 'nullable|min:8|confirmed',
            'role'        => 'required',
            'permissions' => 'nullable|array',
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $account = User::find($id) ?? Admin::findOrFail($id);
                $roleModel = Role::where('name', $request->role)->first();

                $data = [
                    'name'  => $request->name,
                    'email' => $request->email,
                ];

                if ($request->filled('password')) {
                    $data['password'] = Hash::make($request->password);
                }

                $account->update($data);

                // Sync Spatie Role
                if ($roleModel) {
                    $account->syncRoles([$roleModel]);
                }

                // Sync Direct Permissions
                if ($request->has('permissions')) {
                    $account->syncPermissions($request->permissions);
                } else {
                    $account->syncPermissions([]);
                }
            });

            return redirect()->route('users.index')
                ->with('success', 'Account updated successfully!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error updating account: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        if (auth()->user() && auth()->user()->id == $id) {
            return redirect()->route('users.index')
                ->with('error', 'You cannot delete your own account!');
        }

        $account = User::find($id) ?? Admin::find($id);

        if ($account) {
            $account->delete();
            return redirect()->route('users.index')
                ->with('success', 'Account deleted successfully!');
        }

        return redirect()->route('users.index')
            ->with('error', 'Account not found.');
    }
}