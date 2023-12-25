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
<h1>Agregar metodo de pago</h1>

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

<form method="POST" action="/metodopagos" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
    </div>


    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Agregar Producto</button>
</form>
@endsection