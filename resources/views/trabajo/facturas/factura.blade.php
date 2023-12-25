<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        h2 {
            margin-top: 20px;
        }
        p {
            margin: 5px 0;
        }
        .detail {
            margin-left: 20px;
        }
        .detail strong {
            margin-right: 5px;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .imk{
            position: absolute;
            margin-left: 350px;
            margin-top: -80px;
            

        }
    </style>
</head>
<body>
    <h1>Factura de Venta</h1>
    
    <p>Id Venta: #{{ $venta->id }}</p>
    <div class="detail">
        <strong>Nombre Del Vendedor:</strong> {{ $venta->empleado->nombre }}
    </div>
    <div class="detail">
        <strong>Correo:</strong> {{ $venta->empleado->correo }}
    </div>

    <h2>Detalle Del Cliente</h2>
    <p>Nombre Del Cliente: {{ $venta->cliente->name }}</p>
    <p>Telefono : {{ $venta->cliente->numero }}</p>

    <h2>Detalle De Venta</h2>
    @foreach($venta->productos as $producto)
        <div class="detail">
            <p><strong>Id producto:</strong> {{ $producto->id }}</p>
            <p><strong>Producto:</strong> {{ $producto->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $producto->pivot->cantidad }}</p>
            <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
            <p class="card-text"><strong>Descuento:</strong> {{ $producto->descuento }}%</p>
            <img src="{{$producto->imagen}}" class="img-thumbnail imk" style="width: 80px;">
            
        </div>
        
    @endforeach

    <div class="total">
        <h2>Total: ${{$venta->total}}</h2>
    </div>
</body>
</html>

