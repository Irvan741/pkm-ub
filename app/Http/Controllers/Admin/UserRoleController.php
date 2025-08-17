<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('admin.account.index', [
            'users' => User::with('roles')->get(),
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->only('name', 'email', 'password'));
        $user->assignRole($request->role);

        return back()->with('success', 'User created.');
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->role);
        return back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
