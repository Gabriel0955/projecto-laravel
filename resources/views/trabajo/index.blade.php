<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de productos cosméticos y derivados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">
    <link href="/dist/output.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="public/estilo.css" rel="stylesheet">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/index">Sistema De Gestión</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse navbar-nav-scroll" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/productos">Producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categorias">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/clientes">Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/empleados">Empleado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/proveedores">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ventas">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/metodopagos">Métodos de Pago</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/bodegas">Bodega</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/favoritos">Favorito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reseñas">Reseña</a>
                </li>
            </ul>
        </div>
    </nav>
    
    @yield('content')
    <script src="{{ asset('js.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


</body>
</html>
