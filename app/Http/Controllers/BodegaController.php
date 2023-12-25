<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        $categoria = Categoria::all();
        return view('trabajo.bodegas.mostrar_bodega', ['producto' => $producto , 'categoria'=> $categoria]);
    }
    public function productosEnCategoria($categoria_id)
    {
        $categoria = Categoria::findOrFail($categoria_id);
        $productos = $categoria->productos;
    
        return view('trabajo.bodegas.categoria_bodega', compact('productos', 'categoria'));
    }
}
