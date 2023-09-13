<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role) {
        return view('admin.role.update', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate(['name' => 'required']);
        $role->update($data);
        return to_route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.role.index');
    }
}
