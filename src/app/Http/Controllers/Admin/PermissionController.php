<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function show()
    {
//        $permissions = Model

        $users = User::Orderby('name')->get();

        return view('admin.permissions', compact('users'));
    }

    public function edit(Request $request)
    {

    }

}
