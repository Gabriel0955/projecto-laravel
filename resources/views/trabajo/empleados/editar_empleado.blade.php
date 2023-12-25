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
<h1>Editar empleado</h1>

<form method="POST" action="/empleados/{{ $empleado->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $empleado->nombre }}">
    </div>
    <div class="form-group">
        <label for="correo">Email:</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{ $empleado->correo }}">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono:</label>
        <input type="number" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
    </div>
    <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" name="direccion" id="direccion"
            value="{{ $empleado->direccion }}">
    </div>
    <div class="form-group">
        <label for="cedula">Cedula:</label>
        <input type="text" class="form-control" name="cedula" id="cedula" value="{{ $empleado->cedula}}">
    </div>
    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <input type="text" class="form-control" name="cargo" id="cargo" value="{{ $empleado->cargo}}">
    </div>

    <div class="form-group">
        <label>Foto Actual:</label>
        <img src="{{ asset($empleado->imagen) }}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control-file" name="imagen">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>

    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Actualizar empleado</button>
</form>
@endsection
