<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = auth('admin')->user();
        $roles = Role::where('slug', '=', 'admin')->pluck('name', 'id')->toArray();
        return view('admin.profile.index', [
            'admin' => $admin,
            'roles' => $roles
        ]);
    }
}