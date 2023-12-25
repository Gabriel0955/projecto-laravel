@extends("trabajo.index")
@section("content")
<!-- productos/editar.blade.php -->
<style>

</style>
<form method="POST" action="/productos/{{ $producto->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <form method="POST" action="/productos/{{ $producto->id }}/editar" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" value="{{ $producto->precio }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $producto->cantidad }}">
            </div>
            <div class="form-group">
                <label for="descuento">Descuento:</label>
                <input type="number" class="form-control" name="descuento" id="descuento" value="{{ $producto->descuento }}">
            </div>
            <!-- Otros campos según tu estructura de datos -->
            <div class="form-group">
                <label for="imagen">Foto Actual:</label>
                <img src="{{asset($producto->imagen)}}" alt="" style="width: 100px">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" value="{{ $producto->imagen }}" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="imagen">Foto2 Actual:</label>
                <img src="{{asset($producto->imagen2)}}" alt="" style="width: 100px">
            </div>
            <div class="form-group">
                <label for="imagen2">Imagen2:</label>
                <input type="file" class="form-control-file" name="imagen2" value="{{ $producto->imagen2 }}">
            </div>
            <div class="form-group">
                <label for="imagen">Foto3 Actual:</label>
                <img src="{{asset($producto->imagen3)}}" alt="" style="width: 100px">
            </div>
            <div class="form-group">
                <label for="imagen3">Imagen3:</label>
                <input type="file" class="form-control-file" name="imagen3" value="{{ $producto->imagen3 }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
    @endsection