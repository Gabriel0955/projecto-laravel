@extends('trabajo.index')
@section('content')
    <div class="container">
        <h1>Editar Venta #{{ $venta->id }}</h1>
        <form method="POST" action="/ventas/{{ $venta->id }}/editar" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" value="{{ $venta->total }}" disabled>
            </div>

            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select class="form-control" id="cliente" name="cliente_id">
                    <option selected disabled>Selecciona un cliente</option>
                    @foreach ($cliente as $clienteItem)
                        <option value="{{ $clienteItem->id }}" {{ $venta->cliente_id === $clienteItem->id ? 'selected' : '' }}>
                            {{ $clienteItem->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="empleado">Empleado:</label>
                <select class="form-control" id="empleado" name="empleado_id">
                    <option selected disabled>Selecciona un empleado</option>
                    @foreach ($empleado as $empleadoItem)
                        <option value="{{ $empleadoItem->id }}" {{ $venta->empleado_id === $empleadoItem->id ? 'selected' : '' }}>
                            {{ $empleadoItem->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="metodo_pago">Método de Pago:</label>
                <select class="form-control" id="metodo_pago" name="metodopago_id">
                    <option selected disabled>Selecciona un método de pago</option>
                    @foreach ($metodopago as $metodoPago)
                        <option value="{{ $metodoPago->id }}" {{ $venta->metodopago_id === $metodoPago->id ? 'selected' : '' }}>
                            {{ $metodoPago->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="productos">Productos:</label>
                @foreach ($venta->productos as $producto)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="productos[]" value="{{ $producto->id }}"
                            {{ in_array($producto->id, $venta->productos->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $producto->nombre }}</label>
                        <input type="number" class="form-control cantidad-input" name="cantidad[]" value="{{ $venta->productos->where('id', $producto->id)->first()->pivot->cantidad ?? 0 }}" {{ in_array($producto->id, $venta->productos->pluck('id')->toArray()) ? '' : 'disabled' }}>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Venta</button>
        </form>
    </div>

    <script>
        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const cantidadInput = this.parentElement.querySelector('.cantidad-input');
                cantidadInput.disabled = !this.checked;
            });
        });
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
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">{{ $producto->nombre }}</option>
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
    </script>
@endsection

