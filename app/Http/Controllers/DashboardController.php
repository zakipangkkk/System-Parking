<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\LogAktivitas; // ⬅️ tambah ini
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {

        $log = LogAktivitas::latest()->take(10)->get(); 
        
            // total semua transaksi (kendaraan masuk)
        $totalMasuk = Transaksi::count();

    // kendaraan yang masih parkir
        $sedangParkir = Transaksi::whereNull('waktu_keluar')->count();
        $totalkeluar = Transaksi::whereNotNull('waktu_keluar')->count();

return view('home', compact(
    'totalkeluar',
    'log',
    'totalMasuk',
    'sedangParkir'
));
        
    }
}