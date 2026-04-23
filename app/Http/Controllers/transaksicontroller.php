<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use App\Models\Tarifparkir;
use App\Models\AreaParkir;
use App\Models\User;


class TransaksiController extends Controller
{
    public function index()
    {
    $transaksi = Transaksi::with(['kendaraan', 'user', 'area'])
                    ->latest()
                    ->get();
    return view('transaksi.index', compact('transaksi'));
    }
    
    public function create(Request $request)
    {
        $kendaraan = null;

    // cek kalau ada input plat nomor
    if ($request->plat_nomor) {
        $kendaraan = Kendaraan::where('plat_nomor', $request->plat_nomor)->first();
        }

    // ambil data area & tarif (biar dropdown dinamis 🔥)
        $area = AreaParkir::all();
        $tarif = Tarifparkir::all();

        return view('transaksi.create', compact('kendaraan', 'area', 'tarif'));
    }
    public function store(Request $request)
    { 
    // validasi
        $request->validate([
        'id_kendaraan' => 'required',
        'id_area' => 'required',
        'id_tarif' => 'required'
    ]);
    // cek apakah kendaraan masih parkir
    $cek = Transaksi::where('id_kendaraan', $request->id_kendaraan)
                    ->where('status', 'masuk')
                    ->first();

    if ($cek) {
        return back()->with('error', 'Kendaraan masih dalam parkiran!');
    }

    // simpan transaksi
    $transaksi = Transaksi::create([
        'id_kendaraan' => $request->id_kendaraan,
        'id_user' => auth()->id(), // pastikan login
        'id_tarif' => $request->id_tarif,
        'id_area' => $request->id_area,
        'waktu_masuk' => now(),
        'status' => 'masuk'
    ]);
    $area = AreaParkir::find($request->id_area);

if ($area->terisi < $area->kapasitas) {
    $area->terisi += 1;
    $area->save();
} else {
    return back()->with('error', 'Area sudah penuh!');
}
    // tambah isi parkir
logAktivitas('kendaraan masuk ' . $transaksi->id_transaksi);

        return redirect()->route('transaksi.index')
                     ->with('success', 'Transaksi dimulai');
    }

public function stop($id)
{
    $transaksi = Transaksi::with('kendaraan.tarif')->findOrFail($id);

    $waktuKeluar = now();

    $durasiDetik = $transaksi->waktu_masuk->diffInSeconds($waktuKeluar);

    // ambil dari database (tiap kendaraan beda)
    $tarifPerDetik = $transaksi->tarif->tarif_per_jam;

    // hitung per detik
    $biaya = $durasiDetik * $tarifPerDetik;

    $transaksi->update([
        'waktu_keluar' => $waktuKeluar,
        'durasi_detik' => $durasiDetik,
        'biaya_total' => $biaya,
        'status' => 'keluar'
    ]);
        // 🔥 KURANGI AREA
    $area = AreaParkir::find($transaksi->id_area);

    if ($area && $area->terisi > 0) {
        $area->terisi = $area->terisi - 1;
        $area->save();
    }

    logAktivitas('kendaraan keluar ' . $transaksi->id_transaksi);


    return redirect()->route('transaksi.index')
        ->with('success', 'Transaksi selesai');
}

    public function struk($id)
    {
        $transaksi = Transaksi::with(['kendaraan', 'tarif'])
                    ->findOrFail($id);

        return view('transaksi.struk', compact('transaksi'));
    }

    public function laporan()
{
    $transaksi = Transaksi::with(['kendaraan', 'user', 'area'])
                    ->latest()
                    ->get();

    return view('owner.laporan', compact('transaksi'));
}
}
