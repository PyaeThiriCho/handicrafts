<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role'     => 'required' 
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')
            ->with('success', 'Team member added successfully!');
    }

    /**
     * Show the form for editing the team member.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        // Get the names of roles currently assigned to this user
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('backend.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Update the team member in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password', // Optional update
            'role' => 'required'
        ]);
    
        $input = $request->all();

        // Check if password is being changed
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            // Remove password from the array so it doesn't overwrite with null
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);

        // Delete old roles and assign the new one
        \DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the team member from storage.
     */
    public function destroy($id)
    {
        // Safety check: Prevent deleting yourself!
        if(auth()->user()->id == $id) {
            return redirect()->route('users.index')
                ->with('error', 'You cannot delete your own account!');
        }

        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}