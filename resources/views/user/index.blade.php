<!-- Memanggil template -->
@extends('template.master')

@section('content')
    


 <br>
 <h1>Ini halaman user</h1>

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
        <td>nama lengkap</td>
        <td>username</td>
        <td>role</td>
        <td>aksi</td>
        <div class="header">
            <div ><a href="{{ route('user.create')}}" class="btn btn-primary">tambahdata</a></div>
        </div>

    </tr>
        

    </thead>
    


   <tbody>

    @php($i = 1)
 @foreach ($users as $user)
 <tr> 
    <td>{{ $i++}}</td>
    <td>{{ $user->nama_lengkap}}</td>
    <td>{{ $user->username}}</td>
    <td>{{ $user->role}}</td>
    <td><a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-warning">Edit</a></td>
    <td><form action="{{ route('user.destroy', $user->id_user) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form></td>

</tr>
@endforeach
   </tbody>
</table>
@endsection

