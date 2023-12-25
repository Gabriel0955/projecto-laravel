@extends('trabajo.index')
@section('content')
<style>
    
    .fot{

        width: 250px;
        
    }

    .card-title{
        font-size: 20px;
    }
    .rd{
        display: block;
    }
    .card-body{
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        align-items: center;
        flex-direction: column;
    }

    @keyframes color{
        10%{
            border-color: red;
        }
        20%{
            border-color: rgb(21, 255, 0);

        }
        30%{
            border-color: red;
        }
        40%{
            border-color: rgb(21, 255, 0);
        }
        50%{
            border-color: red;
        }
        60%{
            border-color: rgb(21, 255, 0);
        }
        70%{
            border-color: red;
        }
        80%{
            border-color: rgb(21, 255, 0);
        }
        90%{
            border-color: red;
        }
        100%{
            border-color: rgb(21, 255, 0);
        }

    }

    .ls{
        border: 1px solid black;
        padding: 20px;
        border-top-right-radius: 2rem;
        border-bottom-left-radius: 2rem;
        animation: 2s color infinite;
        transition: 4s;
    }

    .ht{
        display: block;
        text-align: center;
    }
    #fotp{
        width: 80px;
        text-align: center;
        
    }
    .fotp{
        width: 80px;
        text-align: center;
        
    }


</style>
    <div class="container">
        <h1>Detalles del Producto {{$producto -> nombre}}</h1>

        
        <div class="ls">
            
                <div class="mb-3">
                    <div class="ht">
                        <img class="fotp" id="foto1" src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <img id="fotp" src="{{ asset($producto->imagen2) }}" alt="">
                        <img class="fotp" id="foto3"  src="{{ asset($producto->imagen3) }}" alt="">
                        
                     </div>
                    <div class="card-body">
                        <img class="fot" id="lk" src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <img class="fot" id="lk1" src="{{ asset($producto->imagen2) }}" alt="">
                        <img class="fot" id="lk2"  src="{{ asset($producto->imagen3) }}" alt="">


                        <div class="infor">
                        <h2 class="card-title">{{ $producto->nombre }}</h2>
                        <p class="card-text"><strong>Descripcion:</strong> {{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Categoria:</strong> {{ $producto->categoria->nombre }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        <a href="/productos/{{ $producto->id }}/editar" class="btn btn-primary">Editar</a>

                    
                    
                        <form action="/eliminarproducto/{{ $producto->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        
                        </div>
                </div>
          
            
        </div>

    </div>
@endsection
