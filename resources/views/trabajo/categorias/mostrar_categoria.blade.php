@extends('trabajo.index')
@section('content')
<style>
        @keyframes color{
        10%{
            border-color: red;
        }
        20%{
            border-color: rgb(21, 255, 0);

        }
        30%{
            border-color: red;
        }
        40%{
            border-color: rgb(21, 255, 0);
        }
        50%{
            border-color: red;
        }
        60%{
            border-color: rgb(21, 255, 0);
        }
        70%{
            border-color: red;
        }
        80%{
            border-color: rgb(21, 255, 0);
        }
        90%{
            border-color: red;
        }
        100%{
            border-color: rgb(21, 255, 0);
        }

    }
    .categoria-card {
        margin-bottom: 20px;
        text-align: center;
        position: relative;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        animation: 5s color infinite;
        transition: box-shadow 0.3s ease-in-out;
    }

    .categoria-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .categoria-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .categoria-title {
        color: #333;
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .btn-edit {
        color: #fff;
        background-color: #007bff;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }
    .btn-edi {
        color: #000000;
        background-color: #1eff00;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-edi:hover {
        background-color: #06b300;
    }
</style>
<div class="container">
    <h1>Lista de Categorias</h1>

    <a href="/agregar-categoria" class="btn btn-success mb-3">Agregar Categoria</a>
    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-md-4">
                <div class="categoria-card">
                    <a href="/categoria/{{$categoria->id}}">   
                    <img class="categoria-img" src="{{ asset($categoria->imagen) }}" alt="{{ $categoria->nombre }}">
                    <h2 class="categoria-title">{{ $categoria->nombre }}</h2>
                    </a>
                    <a href="/categoria/{{$categoria->id}}" class="btn-edi"> Ver</a>
                    
                    <a href="/categorias/{{ $categoria->id }}/editar" class="btn-edit">Editar</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

