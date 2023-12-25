@extends('trabajo.index')
@section('content')
    <div class="container">
        <h1>Bodega De Productos</h1>
        <div class="list-group">
            @foreach ($categoria as $categoria)
                <a href="/bodegas/{{ $categoria->id }}" class="list-group-item list-group-item-action">{{ $categoria->nombre }}</a>
            @endforeach
        </div>
    </div>
@endsection