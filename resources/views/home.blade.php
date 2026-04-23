@extends('template.master')

@section('content')


<style>
    /* CONTENT */
.content {
    flex: 1;
    padding: 25px;
}

/* CARD */
.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 8px;
    flex: 1;
    box-shadow: 0 4px 8px rgba(0,0,0,.05);
}

.card h3 {
    font-size: 14px;
    color: #6b7280;
}

.card p {
    font-size: 28px;
    font-weight: bold;
    margin-top: 10px;
}
<style>
.log-card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-top: 20px;
}

.log-card h3 {
    margin-bottom: 15px;
    font-size: 18px;
}

/* Table */
.log-table {
    width: 100%;
    border-collapse: collapse;
}

.log-table th {
    background: #3498db;
    color: white;
    padding: 10px;
    text-align: left;
}

.log-table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}

/* Hover effect */
.log-table tr:hover {
    background: #f9f9f9;
}
.table-container {
    width: 90%;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

thead {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

th {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

tbody tr {
    border-bottom: 1px solid #eee;
    transition: 0.3s;
}

tbody tr:hover {
    background-color: #f1f9ff;
    transform: scale(1.01);
}

tbody tr:last-child {
    border-bottom: none;
}

/* badge aktivitas */
.badge {
    padding: 5px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: bold;
}

.badge-login {
    background: #d4edda;
    color: #155724;
}

.badge-logout {
    background: #f8d7da;
    color: #721c24;
}

.badge-lain {
    background: #d1ecf1;
    color: #0c5460;
}
</style>
</style>
    <!-- CONTENT -->
    <main class="content">

        <!-- CARD -->
        <div class="cards">
            <div class="card">
                <h3>Total Transaksi</h3>
                <p>{{$totalMasuk}}</p>
            </div>
            <div class="card">
                <h3>Kendaraan Masuk</h3>
                <p>{{$sedangParkir}}</p>
            </div>
            <div class="card">
                <h3>Kendaraan Keluar</h3>
                <p>{{$totalkeluar}}</p>
            </div>
        </div>

        <h3>Log Aktivitas</h3>

<div class="log-card">


<div class="table-container">
<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Aktivitas</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($log as $item)
        <tr>
            <td>{{ $item->user->username ?? '-' }}</td>

            <td>
                @if(str_contains($item->aktivitas, 'LOGIN'))
                    <span class="badge badge-login">{{ $item->aktivitas }}</span>
                @elseif(str_contains($item->aktivitas, 'LOGOUT'))
                    <span class="badge badge-logout">{{ $item->aktivitas }}</span>
                @else
                    <span class="badge badge-lain">{{ $item->aktivitas }}</span>
                @endif
            </td>

            <td>{{ \Carbon\Carbon::parse($item->waktu_aktivitas)->format('d-m-Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>




    </main>

    @endsection