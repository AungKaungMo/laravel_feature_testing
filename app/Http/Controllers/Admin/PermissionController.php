<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);
        Permission::create($data);
        return redirect()->route('admin.permission.index');
    }

    public function edit(Permission $permission) {
        return view('admin.permission.update', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate(['name' => 'required']);
        $permission->update($data);
        return to_route('admin.permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permission.index');
    }
}

