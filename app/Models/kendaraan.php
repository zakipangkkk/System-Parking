<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'tb_kendaraan';
    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'plat_nomor',
        'jenis_kendaraan',
        'warna',
        'pemilik',
        'id_user',
        'id_tarif'
    ];


    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_kendaraan');
    }
    public function tarif()
    {
        return $this->belongsTo(Tarifparkir::class, 'id_tarif');
    }
}
