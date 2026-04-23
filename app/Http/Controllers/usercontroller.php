<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:tb_user,username',
            'password' => 'required',
            'role' => 'required',
        ]);

        Users::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'status_aktif' => 1
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan');
    } 
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('user.edit',compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:tb_user,username,' . $id . ',id_user',
            'role' => 'required',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => $request->role,
            'status_aktif' => $request->status_aktif ?? 1
        ];

        // kalau password diisi, update
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
    
}
