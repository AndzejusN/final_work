<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;


class UserController extends Controller
{

    public function show()
    {
        $users = Models\User::orderBy('name')->with('permission')->paginate(5);
        $permissions = Models\Permission::with('user')->get();

        return view('admin.permissions', compact('users', 'permissions'));
    }

    public function edit(Request $request, $id)
    {
        Models\User::where('id', $id)->update([
            'permission' => $request->permission,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('admin.permissions');
    }

    public function create()
    {
        $users = Models\User::get();
        $permissions = Models\Permission::get();

        return view('admin.registration', compact('users', 'permissions'));
    }

    public function registration()
    {
        $users = Models\User::paginate(5);

        return view('admin.deregistration', compact('users'));
    }

    public function delete($id)
    {
        Models\User::where('id', $id)->delete();

        return redirect()->route('admin.deregistration.index');
    }
}
