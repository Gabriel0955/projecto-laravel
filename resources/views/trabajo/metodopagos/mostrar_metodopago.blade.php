@extends('trabajo.index')
@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-semibold">Lista de Métodos de Pago</h1>

    <a href="/agregar-metodopago" class="bg-green-500 text-white px-4 py-2 rounded-md inline-block mt-3 hover:bg-green-600">Agregar Método de Pago</a>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        @foreach($metodopago as $metodo)
        <div class="bg-white rounded-md shadow-md">
            <div class="p-4">
                <h5 class="text-lg font-semibold">{{ $metodo->nombre }}</h5>
                <!-- Agrega más contenido aquí si es necesario -->
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

