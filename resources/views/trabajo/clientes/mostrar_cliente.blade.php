@extends('trabajo.index')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Lista de Clientes</h1>

        <a href="/agregar-cliente" class="btn btn-success mb-3">Agregar Cliente</a>

        <div class="row">
            @foreach($cliente as $cliente)
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{$cliente->name}}</h5>
                            <p class="card-text"><strong>Dirección:</strong> {{$cliente->direccion}}</p>
                            <p class="card-text"><strong>Teléfono:</strong> {{$cliente->numero}}</p>
                            <p class="card-text"><strong>Correo:</strong> {{$cliente->correo}}</p>
                            <a href="/clientes/{{$cliente->id}}/favoritos">lista de favoritos</a>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/clientes/{{$cliente->id}}/editar" class="btn btn-sm btn-primary">Editar</a>

                                <form action="/eliminarcliente/{{$cliente->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
