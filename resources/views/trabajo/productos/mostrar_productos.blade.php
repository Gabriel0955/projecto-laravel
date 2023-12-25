@extends('trabajo.index')
@section('content')
<style>
    @keyframes color {
        10% {
            border-color: red;
        }
        20% {
            border-color: rgb(21, 255, 0);
        }
        30% {
            border-color: red;
        }
        40% {
            border-color: rgb(21, 255, 0);
        }
        50% {
            border-color: red;
        }
        60% {
            border-color: rgb(21, 255, 0);
        }
        70% {
            border-color: red;
        }
        80% {
            border-color: rgb(21, 255, 0);
        }
        90% {
            border-color: red;
        }
        100% {
            border-color: rgb(21, 255, 0);
        }
    }

    .card {
        width: 18rem;
        margin: 20px;
    }

    .card-img-top {
        object-fit: cover;
    }

    .card-title {
        font-size: 1.25rem;
    }

    .card-text {
        font-size: 0.9rem;
        color: #555;
    }

    .btn {
        margin-right: 5px;
    }

    .btn.rd {
        margin-bottom: 20px;
    }

    .descuento {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 5px;
        border-radius: 3px;
        font-size: 0.8rem;
        border: 2px solid black;
        animation: 5s color infinite;
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
</style>
<div class="container">
    <h1 class="mb-4">Lista de Productos</h1>

    <a href="/agregar-producto" class="btn btn-success mb-3 rd">Agregar Producto</a>
    <div class="row">
        @foreach($productos as $producto)
        

        
            <div class="card">
                <span class="descuento">{{$producto->descuento}}%</span>
                <a href="/productos/{{ $producto->id }}" >
                <img src="{{$producto->imagen}}" class="card-img-top" alt="{{$producto->nombre}}">
                
                <div class="card-body">
                    
                    <h5 class="card-title">{{$producto -> nombre}}</h5>
                </a>
                    <p class="card-text"><strong>Categoría:</strong> {{$producto -> categoria -> nombre}}</p>
                    <p class="card-text"><strong>Precio:</strong> ${{$producto -> precio}}</p>
                    <p class="card-text"><strong>Cantidad:</strong> {{$producto -> cantidad}}</p>
   

                    
                    <a href="/productos/{{ $producto->id }}/editar" class="btn btn-primary btn-sm">Editar</a>
                    <form action="/eliminarproducto/{{ $producto->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <a href="/agregar-venta" class="btn btn-success btn-sm">Crear Venta</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection