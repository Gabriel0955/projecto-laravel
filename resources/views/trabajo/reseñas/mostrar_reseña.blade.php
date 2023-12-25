@extends('trabajo.index')
@section('content')
<style>
    .container {
	max-width: 640px;
	margin: 30px auto;
	background: #fff;
	border-radius: 8px;
	padding: 20px;
    }
    .comment {
	display: block;
	transition: all 1s;
    }
    .commentClicked {
	min-height: 0px;
	border: 1px solid #eee;
	border-radius: 5px;
	padding: 5px 10px
    }
    .container textarea {
	width: 100%;
	border: none;
	background: #E8E8E8;
	padding: 5px 10px;
	height: 50%;
	border-radius: 5px 5px 0px 0px;
	border-bottom: 2px solid #016BA8;
	transition: all 0.5s;
	margin-top: 15px;
    }
    button.primaryContained {
	background: #016ba8;
	color: #fff;
	padding: 10px 10px;
	border: none;
	margin-top: 0px;
	cursor: pointer;
	text-transform: uppercase;
	letter-spacing: 4px;
	box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
	transition: 1s all;
	font-size: 10px;
	border-radius: 5px;
    }
</style>
<div class="container">
    <h1>Reseñas</h1>
    <a href="/agregar-reseña" class="btn btn-primary mt-3">Agregar Reseña</a>
    <div class="list-group mt-3">
        @foreach ($reseña as $reseña)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Cliente: {{ $reseña->cliente->name }}</h5>
                    <p class="card-text">Producto: {{ $reseña->producto->nombre }}</p>
                    <p class="card-text">Comentario: {{ $reseña->comentario }}</p>

                </div>
                <form action="/eliminarreseñas/{{$reseña->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection

