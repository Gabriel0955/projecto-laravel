<?php

namespace App\Http\Controllers;
use App\Models\Ventas;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\MetodoPago;
use App\Models\Producto;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $venta = Ventas::all();
        return view('trabajo.ventas.mostrar_venta', ['venta'=> $venta]);
    }
    public function create()
    {
        $cliente = Cliente::all();
        $productos = Producto::all();
        $empleado = Empleado::all();
        $metodopago = MetodoPago::all();
        return view('trabajo.ventas.agregar_venta',['cliente' => $cliente , 'productos' => $productos , 'empleado' => $empleado , 'metodopago' => $metodopago]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'cliente_id' => 'required',
            'empleado_id'=> 'required',
            'metodopago_id'=> 'required',
            'productos'=> 'required',
            'cantidad'=> 'required',

      
        ]);

    $venta = new Ventas();

    $venta->total = $request->input('total');
    $venta->cliente_id = $request->input('cliente_id');
    $venta->empleado_id = $request->input('empleado_id');
    $venta->metodopago_id = $request->input('metodopago_id');
    $venta->save();

    // Obtener los datos de productos, cantidad y precio unitario del formulario
    $productos = $request->input('productos');
    $cantidades = $request->input('cantidad');
  
    $precioTotal = 0;

    // Vincular los productos con la venta, junto con la cantidad y el precio unitario
    foreach ($productos as $index => $productoId) {
        $producto = Producto::findOrFail($productoId);
        $cantidad = $cantidades[$index];
        // $precioUnitario = $preciosUnitarios[$index];
        $descuento = $producto->descuento;
        // Calcular el precio por cantidad
        $precioPorCantidad = $producto->precio * $cantidad * (1 - ($descuento / 100));
        $precioTotal += $precioPorCantidad;
        if ($cantidad > $producto->cantidad) {
            return redirect('/agregar-venta')->with('error', 'La cantidad seleccionada supera la cantidad disponible');
        } elseif ($cantidad == 0) {
            return redirect('/agregar-venta')->with('error', 'La cantidad seleccionada debe ser mayor que cero');
        }
        $producto->cantidad -= $cantidad;
        $producto->save();
        // Vincular el producto con la venta
        $venta->productos()->attach($productoId, [
            'cantidad' => $cantidad,
            // 'precio_unitario' => $precioUnitario,
        ]);
        }


    // Asignar el precio total a la venta
    $venta->total = $precioTotal;
    $venta->save();



        return redirect('/ventas')->with('success', 'venta agregada correctamente');
    }
    public function destroy($id)
    {
        $venta = Ventas::findOrFail($id);

        // Aplicar el borrado lógico
        $venta->delete();

        return redirect('/ventas')->with('success', 'Proveedor borrado correctamente');
    }

    public function edit($id)
    {
        $venta = Ventas::findOrFail($id);
        $cliente = Cliente::all();
        $productos = Producto::all();
        $empleado = Empleado::all();
        $metodopago = MetodoPago::all();
        
        return view('trabajo.ventas.editar_venta', compact('venta', 'cliente', 'productos', 'empleado', 'metodopago'));
    }
    

    public function update(Request $request, $id)
    {
        $venta = Ventas::findOrFail($id);
        
       
        $venta->total = $request->input('total');
        $venta->cliente_id = $request->input('cliente_id');
        $venta->empleado_id = $request->input('empleado_id');
        $venta->metodopago_id = $request->input('metodopago_id');
        $venta->save();
    
        // Obtener los datos de productos y cantidades del formulario
        $productos = $request->input('productos');
        $cantidades = $request->input('cantidad');
        $precioTotal = 0;
    
        // Eliminar los productos asociados a esta venta para volver a vincularlos
        $venta->productos()->detach();
    
        // Vincular los productos con la venta, junto con la cantidad y el precio unitario
        foreach ($productos as $index => $productoId) {
            $producto = Producto::findOrFail($productoId);
            $cantidad = $cantidades[$index];
    
            // Calcular el precio por cantidad
            $precioPorCantidad = $producto->precio * $cantidad;
            $precioTotal += $precioPorCantidad;
    
            // Vincular el producto con la venta
            $venta->productos()->attach($productoId, [
                'cantidad' => $cantidad,
            ]);
        }
    
        // Asignar el precio total a la venta
        $venta->total = $precioTotal;
        $venta->save();
    
        return redirect('/ventas')->with('success', 'Venta actualizada correctamente');
    }
    

}
