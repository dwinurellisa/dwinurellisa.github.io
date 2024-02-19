<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Player;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $data_role = Role::all();
        $playerselected = Player::all(); // Gantilah dengan model Player yang sesuai

        return view('role.index', compact('roles', 'data_role', 'playerselected'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaRole' => 'required|string',
        ]);

        $role = new Role([
            'nama' => strtoupper($request->input('namaRole')),
        ]);

        $role->save();

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaRole' => 'required|string',
        ]);

        $role = Role::find($id);
        $role->nama = strtoupper($request->input('namaRole'));
        $role->save();

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
