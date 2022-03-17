<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class UserController extends Controller
{

    public function show()
    {
     $users = Models\User::orderBy('name')->with('permission')->get();
     $permissions = Models\Permission::with('user')->get();

     return view('admin.permissions',compact('users','permissions'));
    }

    public function edit()
    {

    }

//    public function show()
//    {
//        $user = user()::get();
//        dd($user->permission);
//
//
////        $permissions = Permission::Orderby('name')->get();
//        $users = User::Orderby('name')->with('permissions')->get();
//
//        return view('admin.permissions', compact('users','permissions'));
//    }
//
//    public function edit(Request $request)
//    {
//
//    }



}
