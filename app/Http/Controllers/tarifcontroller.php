<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifparkir;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarifparkir::all();
        return view('tarif.index',compact('tarif'));
    }

    public function create()
    {
        return view('tarif.create');
    }
    
    public function store(Request $request)
    {
            $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required',
        ]);

        Tarifparkir::create([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam
        ]);

        return redirect()->route('tarif.create')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $tarif = Tarifparkir::findOrFail($id);
        return view('tarif.edit', compact('tarif'));
    }
    public function update(Request $request, $id)
    {
        $tarif = Tarifparkir::findOrFail($id);

        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required'
        ]);

        $data = [
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ];


        $tarif->update($data);

        return redirect()->route('tarif.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $tarif = Tarifparkir::findOrFail($id);
        $tarif->delete();

        return redirect()->route('tarif.index')->with('success', 'Data berhasil dihapus');
    }
}