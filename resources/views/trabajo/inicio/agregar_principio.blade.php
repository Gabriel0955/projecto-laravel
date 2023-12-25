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
<h1>Agregar Pagina principal</h1>


<form method="POST" action="principios" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="portada">Imagen De Portada:</label>
        <input type="file" class="form-control-file" name="portada">
    </div>
    <div class="form-group">
        <label for="portada1">Imagen De Portada:</label>
        <input type="file" class="form-control-file" name="portada1">
    </div>
    <div class="form-group">
        <label for="portada2">Imagen De Portada:</label>
        <input type="file" class="form-control-file" name="portada2">
    </div>
    <div class="form-group">
        <label for="portada3">Imagen De Portada:</label>
        <input type="file" class="form-control-file" name="portada3">
    </div>
    <div class="form-group">
        <label for="novedad1">Novedad1:</label>
        <input type="file" class="form-control-file" name="novedad1">
    </div>
    <div class="form-group">
        <label for="novedad2">Imagen:</label>
        <input type="file" class="form-control-file" name="novedad2">
    </div>
    <div class="form-group">
        <label for="novedad3">Imagen:</label>
        <input type="file" class="form-control-file" name="novedad3">
    </div>



    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Agregar Empleado</button>
</form>
@endsection