@extends('trabajo.index')
@section('content')
<!-- resources/views/agregar_producto.blade.php -->
<style>
    .form-group{
        margin-left: 20%;
        margin-right: 20%;
    }
    .btn{
        margin-left: 20%;
    }
</style>
<h1>Agregar Cliente</h1>

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

<form method="POST" action="/clientes" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="direccion">Direccion:</label>
        <textarea class="form-control" name="direccion" id="direccion">{{ old('direccion') }}</textarea>
    </div>

    <div class="form-group">
        <label for="numero">Telefono:</label>
        <input type="number" class="form-control" name="numero" id="numero" value="{{ old('numero') }}">
    </div>
    <div class="form-group">
        <label for="correo">correo:</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}">
    </div>

    


    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Agregar Cliente</button>
</form>
@endsection

