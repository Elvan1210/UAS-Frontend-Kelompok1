@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Menu</div>
        <div class="card-body text-center">
            <a href="{{ route('menu.input') }}" class="btn btn-primary m-2">Input Menu</a>
            <a href="{{ route('menu.list') }}" class="btn btn-success m-2">Lihat Menu</a>
        </div>
    </div>
</div>
@endsection

