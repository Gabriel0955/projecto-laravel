@extends('trabajo.index')
@section('content')
    <style>
        #fondo {
            height: 530px;
            width: 100%;
            opacity: 1;
            transition: 2s;
        }

        #fondo:hover {
            opacity: 0.5;
            transition: 2s;

        }

        #boto {
            position: absolute;
            margin-right: 200px;
            display: flex;
            margin-top: -180px;
            margin-left: 300px;
            border: 2px solid black;
            padding: 10px;
            background-color: black;
            border-radius: 2rem;
            color: aliceblue;
            font-size: 20px;
        }

        #cont {
            display: flex;
            position: absolute;
            width: 500px;
            margin-top: -300px;
            margin-left: 150px;
            text-shadow: 1px 1px 1px black, 1px 1px 1px black, 1px 1px 1px black;
        }

        #con {
            width: 500px;
        }

        .parrafo {
            animation: rotacion 1s infinite;
        }

        .subt {
            text-align: center;
            margin-bottom: 25px;
        }

        .produ {
            width: 100%;
        }

        .container {
            margin-bottom: 30px;
        }

        .jhg {
            height: 500px;
        }

        .lpg {
            width: 70px;
            height: 50px;
            margin-top: 200px;
            background-color: rgb(83, 74, 74);
        }

        .lpg:hover {

            transition: 1s;



        }

        @keyframes color {
            10% {
                border-color: red;
            }

            20% {
                border-color: rgb(21, 255, 0);
            }

            30% {
                border-color: red;
            }

            40% {
                border-color: rgb(21, 255, 0);
            }

            50% {
                border-color: red;
            }

            60% {
                border-color: rgb(21, 255, 0);
            }

            70% {
                border-color: red;
            }

            80% {
                border-color: rgb(21, 255, 0);
            }

            90% {
                border-color: red;
            }

            100% {
                border-color: rgb(21, 255, 0);
            }
        }

        .descuento {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            border-radius: 3px;
            font-size: 0.8rem;
            border: 2px solid black;
            animation: 5s color infinite;
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

        .contai {
            max-width: 640px;

            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 50px;
        }
        .ljh{
          margin-bottom: 120px;
        }
    </style>
    <h1>Bienvenidos a StyleSync</h1>

    @foreach ($principio as $principio)
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="5000">
                    <a href="/agregar-producto"><img src="{{ asset($principio->portada) }}" class="d-block w-100 jhg"
                            alt="..."></a>

                </div>
                <div class="carousel-item" data-interval="3000">
                    <a href="/agregar-producto"><img src="{{ asset($principio->portada1) }}" class="d-block w-100 jhg"
                            alt="..."></a>
                </div>
                <div class="carousel-item" data-interval="2000">
                    <a href="/agregar-producto"><img src="{{ asset($principio->portada2) }}" class="d-block w-100 jhg"
                            alt="..."></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>





        <div class="container mt-5">
            <h2 class="subt">Novedades</h2>
            <div class="row">

                <div class="col-sm-4">

                    <a href="/categoria/1"><img class="produ" src="{{ asset($principio->novedad1) }}" alt=""></a>


                </div>
                <div class="col-sm-4">

                    <a href="/categoria/4"><img class="produ" src="{{ asset($principio->novedad2) }}" alt=""></a>

                </div>
                <div class="col-sm-4">

                    <a href="/categoria/3"><img class="produ" src="{{ asset($principio->novedad3) }}" alt=""></a>

                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h2 class="subt">Productos</h2>
            <div id="carouselExampleIntervals" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $chunks = $productos->chunk(3); // Divide los productos en grupos de 3
                    @endphp
                    @foreach ($chunks as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $producto)
                                    <div class="col-lg-4">


                                        <div class="card">
                                            <span class="descuento">{{ $producto->descuento }}%</span>
                                            <a href="/productos/{{ $producto->id }}">
                                                <img src="{{ asset($producto->imagen) }}" class="card-img-top"
                                                    alt="{{ $producto->nombre }}">

                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                            </a>
                                            <p class="card-text"><strong>Categoría:</strong>
                                                {{ $producto->categoria->nombre }}</p>
                                            <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                                            <a href="/agregar-venta" class="btn btn-success btn-sm "style="block">Crear
                                                Venta</a>

                                            <!-- Agrega más detalles del producto según tu modelo de datos -->
                                        </div>
                                    </div>
                            </div>
                    @endforeach
                </div>
            </div>
    @endforeach
    </div>
    <a class="carousel-control-prev lpg" href="#carouselExampleIntervals" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only pj">Previous</span>
    </a>

    <a class="carousel-control-next lpg" href="#carouselExampleIntervals" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


    </div>
    <section>
      <div class="container ljh">
          <h2 class="subt">Reseñas</h2>

          <div id="carouselExampleIntervals" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  @php
                      $chunks = $reseña->chunk(3); // Divide las reseñas en grupos de 3
                  @endphp
                  @foreach ($chunks as $chunk)
                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                          <div class="row">
                              @foreach ($chunk as $res)
                                  <div class="col-lg-4">
                                      <div class="card">
                                          
                                          <div class="card-body">
                                            <h5 class="card-title">{{ $res->cliente->name }}</h5>
                                            <h2>{{ $res->comentario }}</h2>
                                              
                                              <p class="card-text"> {{ $res->producto->nombre }}</p>
                                              <!-- Agregar más detalles del producto según tu modelo de datos -->
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>

          <form method="POST" action="/nuevo" class="container mt-5">
              @csrf
              <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                          <label for="cliente">Cliente:</label>
                          <select class="form-control" id="cliente" name="cliente_id" required>
                              <option selected disabled>Selecciona un cliente</option>
                              @foreach ($cliente as $client)
                                  <option value="{{ $client->id }}" required>{{ $client->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Productos:</label>
                          <div class="row mb-2">
                              <div class="col">
                                  <select class="form-control producto" name="producto_id" required>
                                      <option selected disabled>Selecciona un producto</option>
                                      @foreach ($productos as $prod)
                                          <option value="{{ $prod->id }}" required>{{ $prod->nombre }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                      <textarea type="text" class="input" name="comentario" placeholder="Escribe un comentario"></textarea>
                      <button type="submit" class="btn btn-success mb-3 pl">Crear Reseña</button>
                  </div><!-- End col -->
              </div>
          </form>
      </div><!-- End Container -->
  </section>

    <div class="container-fluid p-5 bg-primary text-white text-center">

        <a href="/productos"><img class="produ" src="{{ asset($principio->portada3) }}" alt=""> </a>

    </div>
    <a href="/principios/{{ $principio->id }}/editar" style="display:none;" class="btn btn-primary">Editar</a>
    @endforeach
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © {{ date('Y') }} Derechos reservados:
            <a class="text-reset fw-bold" href="/">StyleSync.com</a>
        </div>
        <a href="/agregar-principio" style="display:none;">
            <h3>modificar: Modificar pagina</h3>
        </a>
    </footer>
@endsection
