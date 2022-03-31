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
        $check = Models\User::where('id', $id)->update([
            'permission' => $request->permission,
            'is_active' => $request->is_active
        ]);

        if ($check) {
            $response = ['positive' => 'Permissions successfully changed'];
        } else {
            $response = ['negative' => 'Error, permissions was not changed'];
        }

        return redirect()->route('admin.permissions')->with($response);
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
        $check = Models\User::where('id', $id)->delete();

        if ($check) {
            $response = ['positive' => 'User successfully deleted'];
        } else {
            $response = ['negative' => 'Error, user was not deleted'];
        }

        return redirect()->route('admin.deregistration.index')->with($response);
    }
}
