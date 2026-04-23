@extends('template.master_petugas')

@section('content')

<style>
    .container-box {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    input:focus, select:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(76,175,80,0.3);
    }

    .btn {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-search {
        background: #2196F3;
        color: white;
        margin-bottom: 10px;
    }

    .btn-search:hover {
        background: #0b7dda;
    }

    .btn-submit {
        background: linear-gradient(135deg, #3498db, #3498db);
        color: white;
    }

    .btn-submit:hover {
        opacity: 0.9;
    }

    .card-kendaraan {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 15px;
        margin: 15px 0;
        border-left: 6px solid #3498db;
        box-shadow: 0 5px 10px rgba(0,0,0,0.05);
    }

    .error {
        background: #ffe6e6;
        color: #d8000c;
        padding: 10px;
        border-radius: 8px;
        margin-top: 10px;
        text-align: center;
    }
    a{
        text-decoration: none;
        color: white;
    }

.alert-box {
    position: fixed;
    top: 20px;
    right: 20px;
    min-width: 300px;
    max-width: 350px;
    padding: 16px 20px;
    border-radius: 12px;
    color: #fff;
    font-weight: 500;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    gap: 12px;
    animation: slideIn 0.4s ease, fadeOut 0.5s ease 3.5s forwards;
    z-index: 9999;
}

.alert-error {
    background: linear-gradient(135deg, #ff4d4d, #c9184a);
}

.alert-success {
    background: linear-gradient(135deg, #00c853, #2e7d32);
}

.alert-icon {
    font-size: 22px;
}

.alert-text {
    flex: 1;
}

.close-btn {
    cursor: pointer;
    font-size: 18px;
    opacity: 0.7;
}

.close-btn:hover {
    opacity: 1;
}

/* Animasi masuk */
@keyframes slideIn {
    from {
        transform: translateX(120%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Animasi keluar */
@keyframes fadeOut {
    to {
        opacity: 0;
        transform: translateX(120%);
    }
}

</style>

<div class="container-box">
    <h2>Tambah Transaksi</h2>

    {{-- 🔍 SEARCH --}}
    <form method="GET" action="{{ route('transaksi.create') }}">
        <label>Plat Nomor</label>
        <input type="text" name="plat_nomor" placeholder="Contoh: B1234XYZ" value="{{ request('plat_nomor') }}" required>
        <button class="btn btn-search" type="submit">Cari Kendaraan</button>
    </form>

    {{-- ❌ ERROR --}}
    @if(request('plat_nomor') && !$kendaraan)
        <div class="error">
            Kendaraan tidak ditemukan! Daftarkan dulu.
        </div>
        <div>
            <button class="btn btn-submit"><a href="/kendaraan/create">ayo daftar kan kendaraan anda</a></button>
        </div>
    @endif

    {{-- ✅ DATA --}}
    @if($kendaraan)
        <div class="card-kendaraan">
            <p><b>🚗 Plat:</b> {{ $kendaraan->plat_nomor }}</p>
            <p><b>📌 Jenis:</b> {{ $kendaraan->jenis_kendaraan }}</p>
        </div>

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id_kendaraan }}">

            <label>Area Parkir</label>
            <select name="id_area" required>
                <option value="">-- Pilih Area --</option>
                @foreach($area as $a)
                    <option value="{{ $a->id_area }}">{{ $a->nama_area }} terisi {{$a->terisi}}</option>
                @endforeach
            </select>

            <label>Tarif</label>
            <select name="id_tarif" required>
                <option value="">-- Pilih Tarif --</option>
                @foreach($tarif as $t)
                    <option value="{{ $t->id_tarif }}">
                        {{ $t->jenis_kendaraan }} - Rp {{ number_format($t->tarif_per_jam) }}
                    </option>
                @endforeach
            </select>
            
        @if(session('error'))
            <div class="alert-box alert-error" id="alertBox">
                <span class="alert-icon">⚠️</span>
                <div class="alert-text">
                    {{ session('error') }}
            </div>
                <span class="close-btn" onclick="closeAlert()">✖</span>
            </div>
            @endif

            <button class="btn btn-submit" type="submit">
                 Mulai Parkir
            </button>
        </form>
    @endif
</div>

@endsection