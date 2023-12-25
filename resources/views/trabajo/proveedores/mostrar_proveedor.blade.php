@extends('trabajo.index')

@section('content')
    <style>
        .card {
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 5px;
        }

        .btn {
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <h1 class="mb-4">Lista de Proveedores</h1>

        <a href="/agregar-proveedor" class="btn btn-success mb-3">Agregar Proveedor</a>

        <div class="row">
            @foreach($proveedor as $prov)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $prov->nombre }}</h2>
                            <p class="card-text"><strong>Email:</strong> {{ $prov->email }}</p>
                            <p class="card-text"><strong>Teléfono:</strong> {{ $prov->telefono }}</p>
                            <p class="card-text"><strong>Dirección:</strong> {{ $prov->direccion }}</p>
                            <p class="card-text"><strong>Categoría:</strong> {{ $prov->categoria->nombre }}</p>
                            <a href="/proveedores/{{ $prov->id }}/editar" class="btn btn-primary">Editar</a>

                            <form action="/proveedores/{{ $prov->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
