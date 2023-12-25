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
<h1>Editar Metodos de Pagos</h1>

<form method="POST" action="/editar-pago/{{ $metodopago->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $metodopago->nombre }}">
    </div>

    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Actualizar cliente</button>
</form>
@endsection