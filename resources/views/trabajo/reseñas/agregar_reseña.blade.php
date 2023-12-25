@extends('trabajo.index')
@section('content')
    <style>
        .pl {
            display: block;
        }
    </style>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups! Hubo algunos problemas con los datos ingresados:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<h1>Agregar Reseña</h1>
    <form method="POST" action="/reseñas" class="container mt-5">
        @csrf
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select class="form-control" id="cliente" name="cliente_id" required>
                <option selected disabled>Selecciona un cliente</option>
                @foreach ($cliente as $cliente)
                    <option value="{{ $cliente->id }}" required>{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" >
            <label>Productos:</label>
            <div class="row mb-2">
                <div class="col">
                    <select class="form-control producto" name="producto_id" required>
                        <option selected disabled>Selecciona un producto</option>
                        @foreach ($producto as $producto)
                            <option value="{{ $producto->id }}"  required>{{ $producto->nombre }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario:</label>
            <textarea class="form-control" name="comentario" id="cometario">{{ old('comentario') }}</textarea>
        </div>





        <button type="submit" class="btn btn-success mb-3 pl">Crear Reseña</button>
    </form>


@endsection
