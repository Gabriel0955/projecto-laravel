<?php

namespace App\Http\Controllers;
use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function index()
    {
        $metodopago  = MetodoPago::all();
        return view('trabajo.metodopagos.mostrar_metodopago', ['metodopago' => $metodopago]);
    }
    public function create()
    {
        
       
        return view('trabajo.metodopagos.agregar_metodopago');
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',

        ]);

        $metodopago = new metodopago();
        $metodopago->nombre = $request->input('nombre');

    

        $metodopago->save();

        return redirect('/metodopagos')->with('success', 'Categoria agregada correctamente');
    }
    public function destroy($id)
    {
        $metodopago = MetodoPago::findOrFail($id);
    
        // Aplicar el borrado lógico
        $metodopago->delete();
    
        return redirect('/metodopagos')->with('success', 'metodopago borrado correctamente');
    }
    public function edit($id)
    {
        $metodopago = MetodoPago::findOrFail($id);
        return view('trabajo.metodopagos.editar_metodopago', compact('metodopago'));
    }

    public function update(Request $request, $id)
    {
        $metodopago = MetodoPago::findOrFail($id);
    
        // Lógica para validar y actualizar los datos del metodopago con los datos recibidos en la solicitud
        $metodopago->nombre = $request->input('nombre');
        // Actualizar otros campos según tu estructura de base de datos
        $metodopago->save();
        return redirect('/metodopagos')->with('success', 'metodopago actualizado correctamente');
    }

}
