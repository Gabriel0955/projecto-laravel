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
    .card-img-top{
        width: 20%;
    }
</style>
<h1>Editar inicio</h1>


<form method="POST" action="/principios/{{ $principio->id }}/editar" enctype="multipart/form-data">
    @csrf

    @method('PUT')
   
    <div class="form-group">
        <label >Foto Actual portada:</label>
        <img src="{{asset($principio->portada)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="portada">Imagen:</label>
        <input type="file" class="form-control-file" name="portada">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>
    <div class="form-group">
        <label >Foto Actual portada1:</label>
        <img src="{{asset($principio->portada1)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="portada1">Imagen:</label>
        <input type="file" class="form-control-file" name="portada1">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>
    <div class="form-group">
        <label >Foto Actual portada2:</label>
        <img src="{{asset($principio->portada2)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="portada2">Imagen:</label>
        <input type="file" class="form-control-file" name="portada2">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>
    <div class="form-group">
        <label >Foto Actual final:</label>
        <img src="{{asset($principio->portada3)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="portada3">Imagen:</label>
        <input type="file" class="form-control-file" name="portada3">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>

    <div class="form-group">
        <label >novedad1:</label>
        <img src="{{asset($principio->novedad1)}}"  class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="novedad1">Imagen:</label>
        <input type="file" class="form-control-file" name="novedad1">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>
    <div class="form-group">
        <label >Foto Actual:</label>
        <img src="{{asset($principio->novedad2)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="novedad2">Imagen:</label>
        <input type="file" class="form-control-file" name="novedad2">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>

    <div class="form-group">
        <label >Foto Actual:</label>
        <img src="{{asset($principio->novedad3)}}" class="card-img-top" alt="#">
    </div>
    <div class="form-group">
        <label for="novedad3">Imagen:</label>
        <input type="file" class="form-control-file" name="novedad3">
        <small class="form-text text-muted">Sube una nueva imagen si deseas cambiarla.</small>
    </div>



    <!-- Otros campos necesarios -->

    <button type="submit" class="btn btn-primary">Actualizar Inicio</button>
</form>
@endsection