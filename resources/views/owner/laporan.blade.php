@extends('template.master_owner')

@section('content')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
    }

    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:hover {
        background-color: #f2f2f2;
    }
</style>

<table>
    <tr>
        <th>No</th>
        <th>Plat</th>
        <th>Jenis</th>
        <th>Petugas</th>
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Total</th>
    </tr>

    @foreach($transaksi as $t)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $t->kendaraan->plat_nomor ?? '-' }}</td>
        <td>{{ $t->kendaraan->jenis_kendaraan ?? '-' }}</td>
        <td>{{ $t->user->username ?? '-' }}</td>
        <td>{{ $t->waktu_masuk }}</td>
        <td>{{ $t->waktu_keluar ?? '-' }}</td>
        <td>{{ $t->biaya_total ?? '-' }}</td>
    </tr>
    @endforeach
</table>

@endsection