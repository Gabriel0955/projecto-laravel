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
<h1>Editar Proveedor</h1>

<form method="POST" action="/proveedores/{{ $proveedor->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $proveedor->nombre }}">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $proveedor->email }}">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono:</label>
        <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $proveedor->telefono }}">
    </div>
    <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" name="direccion" id="direccion"
            value="{{ $proveedor->direccion }}">
    </div>



    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
</form>
@endsection
