@extends('trabajo.index')
@section('content')
<style>
    .form-group {
        margin-left: 20%;
        margin-right: 20%;
    }

    .btn {
        margin-left: 20%;
    }

    .card-img-top {
        width: 20%;
    }
</style>
<h1>Editar cliente</h1>

<form method="POST" action="/clientes/{{ $cliente->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $cliente->name }}">
    </div>
    <div class="form-group">
        <label for="numero">Telefono:</label>
        <input type="number" class="form-control" name="numero" id="numero" value="{{ $cliente->numero }}">
    </div>
    <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" name="direccion" id="direccion"
            value="{{ $cliente->direccion }}">
    </div>
    <div class="form-group">
        <label for="correo">correo:</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{ $cliente->correo }}">
    </div>

    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Actualizar cliente</button>
</form>
@endsection
