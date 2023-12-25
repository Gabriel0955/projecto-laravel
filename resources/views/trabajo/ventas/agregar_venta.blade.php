@extends('trabajo.index')
@section('content')
    <style>
        .pl {
            display: block;
        }
    </style>

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
<h1>Agregar venta</h1>
    <form method="POST" action="/ventas" class="container mt-5">
        @csrf

        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select class="form-control" id="cliente" name="cliente_id" required>
                <option selected disabled>Selecciona un cliente</option>
                @foreach ($cliente as $cliente)
                    <option value="{{ $cliente->id }}" required>{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="empleado">Empleado:</label>
            <select class="form-control" id="empleado" name="empleado_id" required>
                <option selected disabled>Selecciona un empleado</option>
                @foreach ($empleado as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="metodo_pago">Método de Pago:</label>
            <select class="form-control" id="metodo_pago" name="metodopago_id" required>
                <option selected disabled>Selecciona un método de pago</option>
                @foreach ($metodopago as $metodoPago)
                    <option value="{{ $metodoPago->id }}">{{ $metodoPago->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sección para agregar productos -->

        <div class="form-group" id="productos-seccion">
            <label>Productos:</label>
            <div class="row mb-2">
                <div class="col">
                    <select class="form-control producto" name="productos[]" required>
                        <option selected disabled>Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-descuento="{{ $producto->descuento }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="cantidad[]" class="form-control cantidad" placeholder="Cantidad" required>
                    <span class="precio" style="display: none;"></span>
                </div>
            </div>
        </div>

        <div id="total-venta" class="mb-3" style="display: none;">
            <strong style="display: none;">Total Venta: $<span id="total-venta-span">0.00</span></strong>
            <strong>Total General: $<span id="total-general">0.00</span></strong>
            <strong style="display: none;">Descuento: <span id="descuento-venta">0%</span></strong>
        </div>

        <button type="button" class="btn btn-primary mb-3" id="agregar-producto">Agregar Producto</button>
        <button type="submit" class="btn btn-success mb-3 pl">Crear Venta</button>
    </form>

    <script>
        function updateDescuento() {
            let totalDescuento = 0;
            const preciosProductos = document.querySelectorAll('.precio');
            preciosProductos.forEach(precioProducto => {
                const descuento = precioProducto.dataset.descuento;
                const totalProductoStr = precioProducto.textContent.split('Total: $')[1];
                if (descuento && totalProductoStr) {
                    const precio = parseFloat(totalProductoStr) * parseFloat(descuento) / 100;
                    totalDescuento += precio;
                }
            });
            const descuentoSpan = document.getElementById('descuento-venta');
            descuentoSpan.textContent = `$${totalDescuento.toFixed(2)} (${totalDescuento ? totalDescuento : '0'}%)`;
        }

        function addChangeEvent(select) {
            select.addEventListener('change', function () {
                const precio = this.options[this.selectedIndex].getAttribute('data-precio');
                const cantidadInput = this.parentElement.nextElementSibling.querySelector('.cantidad');
                const precioSpan = this.parentElement.nextElementSibling.querySelector('.precio');
                const descuento = this.options[this.selectedIndex].getAttribute('data-descuento');

                if (precio) {
                    precioSpan.textContent = `Precio: $${precio} (${descuento}% de descuento)`;
                    precioSpan.style.display = 'block';
                    cantidadInput.addEventListener('input', function() {
                        const totalProducto = (precio * this.value * (1 - descuento / 100)).toFixed(2);
                        precioSpan.textContent = `Precio: $${precio} (${descuento}% de descuento) - Total: $${totalProducto}`;

                        updateTotalGeneral();
                        updateTotalVenta();
                        updateDescuento();
                    });
                } else {
                    precioSpan.textContent = '';
                    precioSpan.style.display = 'none';
                }
            });
        }

        // Agregar evento de cambio para el primer producto
        const primerProducto = document.querySelector('.producto');
        addChangeEvent(primerProducto);

        document.getElementById('agregar-producto').addEventListener('click', function () {
            const productosSeccion = document.getElementById('productos-seccion');
            const div = document.createElement('div');
            div.classList.add('row', 'mb-2');
            div.innerHTML = `
                <div class="col">
                    <select class="form-control producto" name="productos[]" required>
                        <option selected disabled>Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-descuento="{{ $producto->descuento }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="cantidad[]" class="form-control cantidad" placeholder="Cantidad" required>
                    <span class="precio" style="display: none;"></span>
                </div>
            `;
            productosSeccion.appendChild(div);

            // Obtener el nuevo select y asignarle el evento de cambio
            const nuevoSelect = div.querySelector('.producto');
            addChangeEvent(nuevoSelect);
        });

        function updateTotalGeneral() {
            let totalGeneral = 0;
            const preciosProductos = document.querySelectorAll('.precio');
            preciosProductos.forEach(precioProducto => {
                const totalProductoStr = precioProducto.textContent.split('Total: $')[1];
                if (totalProductoStr) {
                    totalGeneral += parseFloat(totalProductoStr);
                }
            });
            document.getElementById('total-general').textContent = totalGeneral.toFixed(2);
        }

        function updateTotalVenta() {
            let totalVenta = 0;
            const preciosProductos = document.querySelectorAll('.precio');
            preciosProductos.forEach(precioProducto => {
                const totalProductoStr = precioProducto.textContent.split('Total: $')[1];
                if (totalProductoStr) {
                    totalVenta += parseFloat(totalProductoStr);
                }
            });
            document.getElementById('total-venta-span').textContent = totalVenta.toFixed(2);
            document.getElementById('total-venta').style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotalGeneral();
            updateTotalVenta();
            updateDescuento();
        });
    </script>
@endsection
