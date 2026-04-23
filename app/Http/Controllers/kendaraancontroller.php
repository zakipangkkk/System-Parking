<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index',compact('kendaraan'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }
    
    public function store(Request $request)
    {
            $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'warna' => 'required',
            'pemilik' => 'required',
        ]);

        Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'jenis_kendaraan' => 'required',
            'plat_nomor' => 'required|unique:tb_kendaraan,plat_nomor,' . $id . ',id_kendaraan',
            'warna' => 'required',
            'pemilik' => 'required'
        ]);

        $data = [
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'plat_nomor' => $request->plat_nomor,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik
        ];


        $kendaraan->update($data);

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil dihapus');
    }
}
