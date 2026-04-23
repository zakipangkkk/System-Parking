<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\areaparkir;

class AreaparkirController extends Controller
{
    public function index()
    {
        $area = areaparkir::all();
        return view('area.index', compact('area'));
    }
    public function create()
    {
        return view('area.create');
    }
    
    public function store(Request $request)
    {
            $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required',
            'terisi' => 'required'
        ]);

        areaparkir::create([
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi
        ]);

        return redirect()->route('area.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $area = areaparkir::findOrFail($id);
        return view('area.edit', compact('area'));
    }
    public function update(Request $request, $id)
    {
        $area = areaparkir::findOrFail($id);

        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required',
            'terisi' => 'required'
        ]);

        $data = [
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi
        ];


        $area->update($data);

        return redirect()->route('area.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $area = areaparkir::findOrFail($id);
        $area->delete();

        return redirect()->route('area.index')->with('success', 'Data berhasil dihapus');
    }
}
