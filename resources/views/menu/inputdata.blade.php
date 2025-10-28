@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Input Data Menu</h4>

    <form action="{{ route('menu.save') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (URL opsional)</label>
            <input type="text" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('menu.list') }}" class="btn btn-secondary">Lihat Data</a>
    </form>
</div>
@endsection
