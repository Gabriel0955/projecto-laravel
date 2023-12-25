<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = Cliente::all();
        return view('trabajo.clientes.mostrar_cliente', ['cliente' => $cliente]);
    }
    public function create()
    {
        $cliente = Cliente::all();
        return view('trabajo.clientes.agregar_cliente',['cliente'=>$cliente]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'direccion' => 'required',
            'numero'=> 'required',
            'correo'=>'required',
        ]);

        $cliente = new Cliente();
        $cliente->name = $request->input('name');
        $cliente->direccion = $request->input('direccion');
        $cliente->numero = $request->input('numero');
        $cliente->correo = $request->input('correo');

    

        $cliente->save();

        return redirect('/clientes')->with('success', 'Categoria agregada correctamente');
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
    
        // Aplicar el borrado lógico
        $cliente->delete();
    
        return redirect('/clientes')->with('success', 'cliente borrado correctamente');
    }
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('trabajo.clientes.editar_cliente', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = cliente::findOrFail($id);
    
        // Lógica para validar y actualizar los datos del cliente con los datos recibidos en la solicitud
        $cliente->name = $request->input('name');
        $cliente->direccion = $request->input('direccion');
        $cliente->numero = $request->input('numero');
        $cliente->correo = $request->input('correo');

        // Actualizar otros campos según tu estructura de base de datos
    

    
        $cliente->save();
    
        return redirect('/clientes')->with('success', 'cliente actualizado correctamente');
    }
    
}
