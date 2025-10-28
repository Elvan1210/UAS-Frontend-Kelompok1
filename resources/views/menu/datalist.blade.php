@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Menu</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
                <tr>
                    <td>{{ $menu->nama }}</td>
                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($menu->gambar)
                            <img src="{{ $menu->gambar }}" alt="gambar" width="70" class="rounded">
                        @else
                            <em>Tidak ada</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('menu.edit', $menu->_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('menu.destroy', $menu->_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus menu ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data menu</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('menu.input') }}" class="btn btn-primary">Tambah Data</a>
</div>
@endsection
