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
<h1>Agregar Producto</h1>

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

<form method="POST" action="/productos" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" class="form-control" name="precio" id="precio" value="{{ old('precio') }}">
    </div>
    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ old('cantidad') }}">
    </div>
    <div class="form-group">
        <label for="categoria" class="form-label">Categoría:</label>
        <select class="form-select" id="categoria" name="categoria_id">
            <option selected disabled>Selecciona una categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    
    <button class="btn mb-3" type="button" onclick="ver()">Agregar Descuento</button>
    <div class="form-group" id="mosta">
        <label for="descuento">Descuento:</label>
        <input type="number" class="form-control" name="descuento" id="descuento" value="{{ old('descuento') }}">
    </div>
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control-file" name="imagen">
    </div>
    <div class="form-group">
        <label for="imagen2">Imagen2:</label>
        <input type="file" class="form-control-file" name="imagen2">
    </div>
    <div class="form-group">
        <label for="imagen3">Imagen3:</label>
        <input type="file" class="form-control-file" name="imagen3">
    </div>


    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary" style="display: block;">Agregar Producto</button>
</form>
<script>
    let descuento = document.getElementById('mosta');
    descuento.style.display = 'none'
    function ver(){
        descuento.style.display = 'block'
    }
</script>
@endsection
