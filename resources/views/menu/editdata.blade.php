@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Edit Menu</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('menu.update', $menu->_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Menu</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $menu->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $menu->harga }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" name="gambar" id="gambar" class="form-control" value="{{ $menu->gambar }}">
                <small class="text-muted">Masukkan URL gambar (opsional)</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('menu.list') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update Menu</button>
            </div>
        </form>
    </div>
</div>
@endsection
