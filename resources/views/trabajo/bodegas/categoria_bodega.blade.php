@extends('trabajo.index')
@section('content')
<div class="container">
    <h1>Bodega de los Productos {{ $categoria->nombre }}</h1>
    <div class="op">
    @if(isset($productos) && count($productos) > 0)
        @foreach($productos as $producto)
        
        <div class="card" style="width: 20rem;">
            <h2>Cantidad:{{$producto->cantidad}}</h2>
            <img src="{{asset($producto->imagen)}}" class="card-img-top bf" alt="{{$producto->nombre}}">
            <div class="card-body">
              <h5 class="card-title">{{$producto -> nombre}}</h5>
              
              <p class="card-text"><strong>Categoria:</strong> {{$producto -> categoria -> nombre}}</p>
              <p class="card-text"><strong>Precio:</strong> {{$producto -> precio}}</p>
              <a href="/productos/{{ $producto->id }}/editar" class="btn btn-primary">Editar</a>
                <form action="/eliminarproducto/{{ $producto->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
          </div>
    
        @endforeach
    @else
        <p>No hay productos disponibles</p>
    @endif
    </div>
    
@endsection