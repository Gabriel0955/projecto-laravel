<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Reseña;
use Illuminate\Http\Request;

class ReseñaController extends Controller
{
    public function index()
    {
        $reseña  = Reseña::all();
        $cliente = Cliente::all();
        $producto = Producto::all();
        return view('trabajo.reseñas.mostrar_reseña', ['reseña' => $reseña , 'cliente' => $cliente , 'producto' => $producto]);
    }
    public function create()
    {
        
        $reseña = Reseña::all();
        $cliente = Cliente::all();
        $producto = Producto::all();
        return view('trabajo.reseñas.agregar_reseña', ['reseña' => $reseña , 'cliente' => $cliente , 'producto' => $producto]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'comentario'=> 'required',
            'cliente_id'=> 'required',
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id'=> 'required',
            'producto_id' => 'required|exists:productos,id',

        
        ]);

        $reseña = new Reseña();
        $reseña->comentario = $request->input('comentario');

        $reseña->cliente_id = $request->input('cliente_id');
        $reseña->producto_id = $request->input('producto_id');

        $reseña->save();

        return redirect('/reseñas')->with('success', 'proveedor agregada correctamente');
    }
    public function agregar(Request $request)
    {
        $request->validate([
            'comentario'=> 'required',
            'cliente_id'=> 'required',
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id'=> 'required',
            'producto_id' => 'required|exists:productos,id',

        
        ]);

        $reseña = new Reseña();
        $reseña->comentario = $request->input('comentario');

        $reseña->cliente_id = $request->input('cliente_id');
        $reseña->producto_id = $request->input('producto_id');

        $reseña->save();

        return redirect('/index')->with('success', 'proveedor agregada correctamente');
    }
    public function destroy($id)
    {
        $reseña = Reseña::findOrFail($id);
    
        // Aplicar el borrado lógico
        $reseña->delete();
    
        return redirect('/reseñas')->with('success', 'metodopago borrado correctamente');
    }
}
