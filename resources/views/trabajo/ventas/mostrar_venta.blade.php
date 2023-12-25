@extends('trabajo.index')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Ventas</h1>
        <a href="/agregar-venta" class="btn btn-success mb-3">Agregar Venta</a>

        <div class="row">
            @foreach($venta as $ventaItem)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">#{{ $ventaItem->id }} <a href="/generar-factura/{{$ventaItem->id}}"><button class="btn btn-pago"  type="button">Pendiente</button></a></h2>
                            <p class="card-text"><strong>Cliente:</strong> {{ $ventaItem->cliente->name }}</p>
                            <p class="card-text"><strong>Vendedor:</strong> {{ $ventaItem->empleado->nombre }}</p>
                            <hr>
                            <div class="productos">
                                @foreach($ventaItem->productos as $producto)
                                    <p class="card-text"><strong>Producto:</strong> {{ $producto->nombre }}</p>
                                    <a href="/productos/{{ $producto->id }}"><img src="{{$producto->imagen}}" class="img-thumbnail" style="width: 80px;"></a>
                                    <p class="card-text"><strong>Cantidad:</strong> {{ $producto->pivot->cantidad }}</p>
                                    <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                                    <p class="card-text"><strong>Descuento:</strong> {{ $producto->descuento }}%</p>

                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                            <strong>Total:</strong> ${{ $ventaItem->total }}
                            <a href="/generar-factura/{{$ventaItem->id}}" class="btn btn-primary btn-sm btn-factura" id="bot" style="display: none;">Factura</a>
                            <a href="/ventas/{{ $ventaItem->id }}/editar" class="btn btn-info btn-sm">Editar</a>
                            <form action="/eliminarventa/{{ $ventaItem->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botonesPago = document.querySelectorAll('.btn-pago');
            let bot = document.getElementById('bot');

            botonesPago.forEach(boton => {
                boton.addEventListener('click', function() {
                    const botonPagar = this;
                    const factura = botonPagar.parentElement.querySelector('.btn-factura');

                    botonPagar.style.background = 'green';
                    botonPagar.innerText = 'Pagado';
                    factura.style.display = 'block';
                    

                });
            });
        });
    </script>
@endsection

