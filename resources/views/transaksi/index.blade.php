@extends('template.master_petugas')

@section('content')

<style>
    h2 {
        margin-bottom: 15px;
    }

    .btn-tambah {
        background: #3498db;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-tambah:hover {
        background: #3498db;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background: #fff;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th {
        background: #3498db;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f9f9f9;
    }

    .status-masuk {
        background: orange;
        color: white;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 12px;
    }

    .status-keluar {
        background: green;
        color: white;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 12px;
    }

    .btn-stop {
        background: red;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-stop:hover {
        background: darkred;
    }

    .btn-cetak {
        background: #2196F3;
        color: white;
        padding: 6px 10px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-cetak:hover {
        background: #0b7dda;
    }
</style>

<h2>Data Transaksi</h2>

<a href="{{ route('transaksi.create') }}" class="btn-tambah">
    + Tambah Transaksi
</a>

<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Plat Nomor</th>
        <th>Area</th>
        <th>Waktu Masuk</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($transaksi as $index => $item)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->kendaraan->plat_nomor ?? '-' }}</td>
        <td>{{ $item->area->nama_area ?? '-' }}</td>
        <td>{{ $item->waktu_masuk }}</td>

        <td>
            @if($item->status == 'masuk')
                <span class="status-masuk">Masuk</span>
            @else
                <span class="status-keluar">Keluar</span>
            @endif
        </td>

        <td>
            @if($item->status == 'masuk')
                <form action="{{ route('transaksi.stop', $item->id_parkir) }}" method="POST">
                    @csrf
                    <button class="btn-stop" type="submit">Stop</button>
                </form>
            @else
                <a href="{{ route('transaksi.struk', $item->id_parkir) }}" class="btn-cetak">
                    Cetak
                </a>
            @endif
        </td>
    </tr>
    @endforeach

</table>

@endsection