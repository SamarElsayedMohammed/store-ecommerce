<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {

         $roles = Role::withCount('mangers')->get();
        return view('dashboard.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('dashboard.roles.create', [
            'role' => new Role,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = Role::create($request->all());

        return redirect()->route('admin.roles.create')
            ->with('success', __('Role :name created!', [
                'name' => $role->name,
            ]));
    }
}