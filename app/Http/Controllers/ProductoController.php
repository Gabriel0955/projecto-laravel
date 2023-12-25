<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductoController extends Controller
{
    // app/Http/Controllers/ProductoController.php



    public function index()
    {
        $productos = Producto::all();
        $cliente = Cliente::all();
        return view('trabajo.productos.mostrar_productos', ['productos' => $productos , 'cliente'=> $cliente]);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('trabajo.productos.mostrar_producto', ['producto' => $producto]);
    }

    public function create()
    {
        
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('trabajo.productos.agregar_producto', ['productos' => $productos,'categorias'=>$categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'categoria_id'=> 'required',
            'categoria_id' => 'required|exists:categorias,id',
        ]);


        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->descuento = $request->input('descuento');
        $producto->cantidad = $request->input('cantidad');


        
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $producto->imagen = 'storage/images/' . $nombreImagen;
        }
        if ($request->hasFile('imagen2')) {
            $imagen2 = $request->file('imagen2');
            $nombreImagen2 = time() . '_' . $imagen2->getClientOriginalName();
            $imagen2->storeAs('public/images', $nombreImagen2);
            $producto->imagen2 = 'storage/images/' . $nombreImagen2;
        }
        if ($request->hasFile('imagen3')) {
            $imagen3 = $request->file('imagen3');
            $nombreImagen3 = time() . '_' . $imagen3->getClientOriginalName();
            $imagen3->storeAs('public/images', $nombreImagen3);
            $producto->imagen3 = 'storage/images/' . $nombreImagen3;
        }
    

        $producto->save();
        

        return redirect('/productos')->with('success', 'Producto agregado correctamente');
    }
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
    
        // Aplicar el borrado lógico
        $producto->delete();
    
        return redirect('/productos')->with('success', 'Producto borrado correctamente');
    }
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('trabajo.productos.editar_producto', compact('producto','categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        // Lógica para validar y actualizar los datos del producto con los datos recibidos en la solicitud
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->descuento = $request->input('descuento');
        $producto->cantidad = $request->input('cantidad');
        // Actualizar otros campos según tu estructura de base de datos
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $producto->imagen = 'storage/images/' . $nombreImagen;
        }
        if ($request->hasFile('imagen2')) {
            $imagen2 = $request->file('imagen2');
            $nombreImagen2 = time() . '_' . $imagen2->getClientOriginalName();
            $imagen2->storeAs('public/images', $nombreImagen2);
            $producto->imagen2 = 'storage/images/' . $nombreImagen2;
        }
        if ($request->hasFile('imagen3')) {
            $imagen3 = $request->file('imagen3');
            $nombreImagen3 = time() . '_' . $imagen3->getClientOriginalName();
            $imagen3->storeAs('public/images', $nombreImagen3);
            $producto->imagen3 = 'storage/images/' . $nombreImagen3;
        }

        $producto->save();

        return redirect('/productos')->with('success', 'Producto actualizado correctamente');
    }

    public function mostrarImagen($id)
    {
        $producto = Producto::findOrFail($id);
        $imagenData = $producto->imagen_data;

        return Response::make($imagenData, 200, [
            'Content-Type' => 'image/jpeg', // Cambia el tipo de contenido según el formato de la imagen
            'Content-Disposition' => 'inline; filename="' . $producto->nombre . '.jpg"', // Cambia la extensión según el tipo de imagen
        ]);
    }
    

    public function productosEnCategoria($categoria_id)
    {
        $categoria = Categoria::findOrFail($categoria_id);
        $productos = $categoria->productos;
    
        return view('trabajo.categorias.en-categoria', compact('productos', 'categoria'));
    }
    
        


}
