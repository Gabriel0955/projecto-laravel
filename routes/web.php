<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\SaludosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Inicio;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReseñaController;
use App\Http\Controllers\VentasController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Symfony\Component\Routing\Router as RoutingRouter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(ProductoController::class)->group(function(){
    
    Route::get('/productos', 'index');
    Route::get('/productos/{id}', 'show');
    Route::get('/agregar-producto', 'create');
    Route::post('/productos', 'store');
    Route::delete('/eliminarproducto/{id}', 'destroy');
    Route::get('/productos/{id}/editar', 'edit');
    Route::put('/productos/{id}/editar', 'update');
    Route::get('/producto/{id}/imagen', 'mostrarImagen')->name('producto.imagen');
    Route::get('/categoria/{categoria_id}', 'productosEnCategoria')->name('productos.categoria');

    

});
Route::controller(CategoriaController::class)->group(function(){
    
    Route::get('/categorias', 'index');

    Route::get('/agregar-categoria', 'create');
    Route::post('/categorias', 'store');
    Route::get('/categorias/{id}/editar', 'edit');
    Route::put('/categorias/{id}/editar', 'update');
    
    


});
Route::controller(ClienteController::class)->group(function(){
    
    Route::get('/clientes', 'index');

    Route::get('/agregar-cliente', 'create');
    Route::post('/clientes', 'store');
    Route::get('/clientes/{id}/editar', 'edit');
    Route::put('/clientes/{id}/editar', 'update');
    Route::delete('/eliminarcliente/{id}', 'destroy');
    
});
Route::controller(EmpleadoController::class)->group(function(){
    
    Route::get('/empleados', 'index');
    Route::get('/agregar-empleado', 'create');
    Route::post('/empleados', 'store');
    Route::delete('/eliminar/{id}', 'destroy');
    Route::get('/empleados/{id}/editar', 'edit');
    Route::put('/empleados/{id}/editar', 'update');
    Route::get('/empleado/{id}/imagen', 'mostrarImagen')->name('empleado.imagen');
    
});

Route::controller(Inicio::class)->group(function(){
    
    Route::get('/index', '__invoke');

    Route::get('/agregar-principio', 'create');
    Route::post('/principios', 'store');
    Route::get('/principios/{id}/editar', 'edit');
    Route::put('/principios/{id}/editar', 'update');
    Route::get('/principios/{id}/imagen', 'mostrarImagen')->name('principio.imagen');
    
});
Route::controller(ProveedorController::class)->group(function(){
    
    Route::get('/proveedores', 'index');
    Route::get('/agregar-proveedor', 'create');
    Route::post('/proveedores', 'store');
    Route::get('/proveedores/{id}/editar', 'edit');
    Route::put('/proveedores/{id}/editar', 'update');

    
});
Route::controller(MetodoPagoController::class)->group(function(){
    
    Route::get('/metodopagos', 'index');
    Route::get('/agregar-metodopago', 'create');
    Route::post('/metodopagos', 'store');
    Route::delete('/eliminarpago/{id}', 'destroy');
    Route::get('/editar-pago/{id}/editar', 'edit');
    Route::put('/editar-pago/{id}/editar', 'update');
 

    
});
Route::controller(VentasController::class)->group(function(){
    
    Route::get('/ventas', 'index');
    Route::get('/agregar-venta', 'create');
    Route::post('/ventas', 'store');
    Route::get('/ventas/{id}/editar', 'edit');
    Route::put('/ventas/{id}/editar', 'update');
    Route::delete('/eliminarventa/{id}', 'destroy');

 

    
});
Route::controller(FacturaController::class)->group(function(){
    
    Route::get('/generar-factura/{id}', 'generarFactura');
    
});
Route::controller(BodegaController::class)->group(function(){
    
    Route::get('/bodegas', 'index');
    Route::get('/bodegas/{categoria_id}', 'productosEnCategoria')->name('productos.categoria');
    
});
Route::controller(loginController::class)->group(function(){
    
    Route::get('/', 'login');
    
});

Route::controller(ReseñaController::class)->group(function(){

    Route::get('/reseñas', 'index');
    Route::get('/agregar-reseña', 'create');
    Route::post('/reseñas', 'store');
    Route::post('/nuevo', 'agregar');
    Route::delete('/eliminarreseñas/{id}', 'destroy');
    
});