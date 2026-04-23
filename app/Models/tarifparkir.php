<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifparkir extends Model
{
    protected $table = 'tb_tarif';
    protected $primaryKey = 'id_tarif';

    protected $fillable = [
        'jenis_kendaraan',
        'tarif_per_jam'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_tarif');
    }
    // public function tarif()
    // {
    //     return $this->belongsTo(Tarifparkir::class, 'id_tarif');
    // }
}
