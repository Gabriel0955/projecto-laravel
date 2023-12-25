@extends("trabajo.index")
@section("content")
<!-- categorias/editar.blade.php -->

<form method="POST" action="/categorias/{{ $categoria->id }}/editar" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}"><br><br>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" value="{{ $categoria->imagen }}"><br><br> 

    <button type="submit">Actualizar Categoria</button>
</form>


@endsection()