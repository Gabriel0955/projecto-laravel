<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('trabajo.categorias.mostrar_categoria', ['categorias' => $categorias]);
    }
    public function create()
    {
        return view('trabajo.categorias.agregar_categoria');
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $categoria->imagen = 'storage/images/' . $nombreImagen;
        }
    

        $categoria->save();

        return redirect('/categorias')->with('success', 'Categoria agregada correctamente');
    }
    public function mostrarImagen($id)
    {
        $categoria = Categoria::findOrFail($id);
        $imagenData = $categoria->imagen_data;

        return Response::make($imagenData, 200, [
            'Content-Type' => 'image/jpeg', // Cambia el tipo de contenido según el formato de la imagen
            'Content-Disposition' => 'inline; filename="' . $categoria->nombre . '.jpg"', // Cambia la extensión según el tipo de imagen
        ]);
    }
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
    
        // Aplicar el borrado lógico
        $categoria->delete();
    
        return redirect('/categorias')->with('success', 'categoria borrado correctamente');
    }
    public function edit($id)
    {
        $categoria = categoria::findOrFail($id);
        return view('trabajo.categorias.editar_categoria', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        
        // Lógica para validar y actualizar los datos del producto con los datos recibidos en la solicitud
        $categoria->nombre = $request->input('nombre');

        // Actualizar otros campos según tu estructura de base de datos
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $categoria->imagen = 'storage/images/' . $nombreImagen;
        }
    

        $categoria->save();

        return redirect('/categorias')->with('success', 'categoria actualizado correctamente');
    }
}
