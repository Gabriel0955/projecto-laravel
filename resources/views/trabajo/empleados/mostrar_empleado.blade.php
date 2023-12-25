@extends('trabajo.index')

@section('content')
    <style>
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
          
            object-fit:cover;
        }

        .card-title {
            font-size: 1.5rem;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .card-text {
            color: #666;
        }

        .btn {
            margin-top: 10px;
        }
  
    </style>

    <div class="container">
        <h1 class="mb-4">Lista de Empleados</h1>

        <a href="/agregar-empleado" class="btn btn-success mb-3">Agregar Empleado</a>

        <div class="row">
            @foreach($empleado as $emp)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $emp->imagen }}" class="card-img-top" alt="{{ $emp->nombre }}">

                        <div class="card-body">
                            <h2 class="card-title">{{ $emp->nombre }}</h2>
                            <p class="card-text"><strong>Dirección:</strong> {{ $emp->direccion }}</p>
                            <p class="card-text"><strong>Teléfono:</strong> {{ $emp->telefono }}</p>
                            <p class="card-text"><strong>Correo:</strong> {{ $emp->correo }}</p>
                            <p class="card-text"><strong>Cédula:</strong> {{ $emp->cedula }}</p>
                            <p class="card-text"><strong>Cargo:</strong> {{ $emp->cargo }}</p>
                            <a href="/empleados/{{ $emp->id }}/editar" class="btn btn-primary">Editar</a>

                            <form action="/eliminar/{{ $emp->id }}" method="POST" style="display: inline;">
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
