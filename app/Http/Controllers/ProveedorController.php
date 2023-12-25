<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedor = Proveedor::all();
        return view('trabajo.proveedores.mostrar_proveedor', ['proveedor' => $proveedor]);
    }
    public function create()
    {
        $categoria = Categoria::all();
        return view('trabajo.proveedores.agregar_proveedor',['categoria' => $categoria]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'categoria_id'=> 'required',
            'categoria_id' => 'required|exists:categorias,id',

        
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->categoria_id = $request->input('categoria_id');

        $proveedor->save();

        return redirect('/proveedores')->with('success', 'proveedor agregada correctamente');
    }
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        // Aplicar el borrado lógico
        $proveedor->delete();

        return redirect('/proveedores')->with('success', 'Proveedor borrado correctamente');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('trabajo.proveedores.editar_proveedor', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        // Lógica para validar y actualizar los datos del proveedor con los datos recibidos en la solicitud
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->direccion = $request->input('direccion');
        // Actualizar otros campos según tu estructura de base de datos

        $proveedor->save();

        return redirect('/proveedores')->with('success', 'Proveedor actualizado correctamente');
    }

}
