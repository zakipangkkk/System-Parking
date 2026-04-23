@extends('template.master')


@section('content')
<style>
    .card {
        width: 400px;
        margin: 40px auto;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        background: #fff;
    }

    .card h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        display: inline-block;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>

<div class="card">
    <h2>update data</h2>

    {{-- Error --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('area.update', $area->id_area) }}" method="POST">
        @csrf
        @method('PUT') {{-- WAJIB untuk update --}}

        <div class="form-group">
            <label>nama_area</label>
            <input type="text" name="nama_area" class="form-control"
                value="{{ old('nama_area', $area->nama_area) }}">
        </div>

        <div class="form-group">
            <label>kapasitas</label>
            <input type="text" name="kapasitas" class="form-control"
                value="{{ old('kapasitas', $area->kapasitas) }}">
        </div>

        <div class="form-group">
            <label>kapasitas</label>
            <input type="text" name="terisi" class="form-control"
                value="{{ old('terisi', $area->terisi) }}">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('area.index') }}" class="btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection