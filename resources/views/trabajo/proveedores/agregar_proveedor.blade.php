@extends('trabajo.index')
@section('content')
<!-- resources/views/agregar_proveedor.blade.php -->
<style>
    .form-group {
        margin-left: 20%;
        margin-right: 20%;
    }

    .btn {
        margin-left: 20%;
    }
</style>
<h1>Agregar Proveedor</h1>

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

<form method="POST" action="/proveedores" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
    </div>
    <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion') }}">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}">
    </div>
    <div class="form-group">
        <label for="email">Correo:</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="categoria" class="form-label">Categoría:</label>
        <select class="form-select" id="categoria" name="categoria_id">
            <option selected disabled>Selecciona una categoría</option>
            @foreach ($categoria as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    




    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
</form>
@endsection
