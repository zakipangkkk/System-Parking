<!-- Memanggil template -->
@extends('template.master')

@section('content')
    


 <br>
 <h1>Ini halaman kendaraan</h1>

<style>
    h1{
        text-align: center;
        font-family: Arial, sans-serif;
        color: #2c3e50;
    }

    table{
        border-collapse: collapse;
        margin: 20px auto;
        width: 70%;
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    table thead{
        background-color: #3498db;
        color: white;
        padding: 12px;
        text-align: center;
    }

    td{
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even){
        background-color: #f2f2f2;
    }

    tr:hover{
        background-color: #eaf6ff;
    }
    .btn {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    }
    .btn-warning {
    background-color: orange;
    color: white;
    }
    .box{
        margin-left: auto
        height: 50px;
        width: 100px;
        background-color: #3498db

    }
    .btn {
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    }
    .btn-primary {
    background-color: #3498db;
}
.header {
    display: f;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0;
}
</style>
 


<table>
    <thead>
    <tr>
        <td>No</td>
        <td>Plat Nomor</td>
        <td>Jenis Kendaraan</td>
        <td>Warna</td>
        <td>Pemilik</td>
        <td>Aksi</td>

    </tr>
        

    </thead>
    


   <tbody>
            @php($i = 1)
            @foreach ($kendaraan as $kd)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $kd->plat_nomor }}</td>
                <td>{{ $kd->jenis_kendaraan }}</td>
                <td>{{ $kd->warna }}</td>
                <td>{{ $kd->pemilik }}</td>
                <td>
                    <a href="{{ route('kendaraan.edit', $kd->id_kendaraan) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('kendaraan.destroy', $kd->id_kendaraan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
   </tbody>
</table>
@endsection

