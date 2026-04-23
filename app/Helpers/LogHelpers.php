<?php

use App\Models\LogAktivitas;

if (!function_exists('logAktivitas')) {
    function logAktivitas($aktivitas)
    {
        try {
            LogAktivitas::create([
                'id_user' => auth()->id(), // kalau belum login bakal null
                'aktivitas' => $aktivitas,
                'waktu_aktivitas' => now()
            ]);
        } catch (\Exception $e) {
            // biar sistem ga error
        }
    }
}