<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleado = Empleado::all();
        return view('trabajo.empleados.mostrar_empleado', ['empleado' => $empleado]);
    }
    public function create()
    {
        
        $empleado = Empleado::all();
        return view('trabajo.empleados.agregar_empleado', ['empleado' => $empleado]);
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono'=> 'required',
            'correo'=> 'required',
            'cedula'=> 'required',
            'imagen' => 'required',
            'cargo' => 'required',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request->input('nombre');
        $empleado->direccion = $request->input('direccion');
        $empleado->telefono = $request->input('telefono');
        $empleado->correo = $request->input('correo');
        $empleado->cedula = $request->input('cedula');
        $empleado->cargo = $request->input('cargo');
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $empleado->imagen = 'storage/images/' . $nombreImagen;
        }

    

        $empleado->save();

        return redirect('/empleados')->with('success', 'Categoria agregada correctamente');
    }
    public function mostrarImagen($id)
    {
        $empleado = Empleado::findOrFail($id);
        $imagenData = $empleado->imagen_data;

        return Response::make($imagenData, 200, [
            'Content-Type' => 'image/jpeg', // Cambia el tipo de contenido según el formato de la imagen
            'Content-Disposition' => 'inline; filename="' . $empleado->nombre . '.jpg"', // Cambia la extensión según el tipo de imagen
        ]);
    }
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
    
        // Aplicar el borrado lógico
        $empleado->delete();
    
        return redirect('/empleados')->with('success', 'empleado borrado correctamente');
    }
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('trabajo.empleados.editar_empleado', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = empleado::findOrFail($id);
    
        // Lógica para validar y actualizar los datos del empleado con los datos recibidos en la solicitud
        $empleado->nombre = $request->input('nombre');
        $empleado->direccion = $request->input('direccion');
        $empleado->telefono = $request->input('telefono');
        $empleado->correo = $request->input('correo');
        $empleado->cedula = $request->input('cedula');
        $empleado->cargo = $request->input('cargo');
        // Actualizar otros campos según tu estructura de base de datos
    
        // Verificar si se ha enviado una nueva imagen para actualizar
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/images', $nombreImagen);
            $empleado->imagen = 'storage/images/' . $nombreImagen;
        }
    
        $empleado->save();
    
        return redirect('/empleados')->with('success', 'Empleado actualizado correctamente');
    }
    
}
