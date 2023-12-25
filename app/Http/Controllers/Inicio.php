<?php

namespace App\Http\Controllers;
use App\Models\Principio;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Reseña;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class Inicio extends Controller
{
    public function __invoke()
    {   $principio = Principio::all();
        $productos = Producto::all();
        $reseña  = Reseña::all();
        $cliente = Cliente::all();
        $producto = Producto::all();

        return view("trabajo.inicio.index", ['principio' => $principio,'productos' => $productos , 'reseña' => $reseña , 'cliente' => $cliente ]);
    }


    public function create()
    {
        
    
        return view('trabajo.inicio.agregar_principio');
    }

    public function store(Request $request)
    {

        $principio = new Principio();

        
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombreportada = time() . '_' . $portada->getClientOriginalName();
            $portada->storeAs('public/images', $nombreportada);
            $principio->portada = 'storage/images/' . $nombreportada;
        }
        if ($request->hasFile('novedad1')) {
            $novedad1 = $request->file('novedad1');
            $nombrenovedad1 = time() . '_' . $novedad1->getClientOriginalName();
            $novedad1->storeAs('public/images', $nombrenovedad1);
            $principio->novedad1 = 'storage/images/' . $nombrenovedad1;
        }
        if ($request->hasFile('novedad2')) {
            $novedad2 = $request->file('novedad2');
            $nombrenovedad2 = time() . '_' . $novedad2->getClientOriginalName();
            $novedad2->storeAs('public/images', $nombrenovedad2);
            $principio->novedad2 = 'storage/images/' . $nombrenovedad2;
        }
        if ($request->hasFile('novedad3')) {
            $novedad3 = $request->file('novedad3');
            $nombrenovedad3 = time() . '_' . $novedad3->getClientOriginalName();
            $novedad3->storeAs('public/images', $nombrenovedad3);
            $principio->novedad3 = 'storage/images/' . $nombrenovedad3;
        }
        if ($request->hasFile('portada2')) {
            $portada2 = $request->file('portada2');
            $nombreportada2 = time() . '_' . $portada2->getClientOriginalName();
            $portada2->storeAs('public/images', $nombreportada2);
            $principio->portada2 = 'storage/images/' . $nombreportada2;
        }
        if ($request->hasFile('portada1')) {
            $portada1 = $request->file('portada1');
            $nombreportada1 = time() . '_' . $portada1->getClientOriginalName();
            $portada1->storeAs('public/images', $nombreportada1);
            $principio->portada1 = 'storage/images/' . $nombreportada1;
        }
        if ($request->hasFile('portada3')) {
            $portada3 = $request->file('portada3');
            $nombreportada3 = time() . '_' . $portada2->getClientOriginalName();
            $portada3->storeAs('public/images', $nombreportada3);
            $principio->portada3 = 'storage/images/' . $nombreportada3;
        }
        if ($request->hasFile('portada4')) {
            $portada4 = $request->file('portada4');
            $nombreportada4 = time() . '_' . $portada2->getClientOriginalName();
            $portada4->storeAs('public/images', $nombreportada4);
            $principio->portada4 = 'storage/images/' . $nombreportada4;
        }
    

        $principio->save();

        return redirect('/index')->with('success', 'principio agregado correctamente');
    }
    public function mostrarImagen($id)
    {
        $principio = Principio::findOrFail($id);
        $imagenData = $principio->imagen_data;

        return Response::make($imagenData, 200, [
            'Content-Type' => 'image/jpeg', // Cambia el tipo de contenido según el formato de la imagen
            'Content-Disposition' => 'inline; filename="' . $principio->nombre . '.jpg"', // Cambia la extensión según el tipo de imagen
        ]);
    }
    public function edit($id)
    {
        $principio = Principio::findOrFail($id);
        return view('trabajo.inicio.editar_principio', compact('principio'));
    }

    public function update(Request $request, $id)
    {
        $principio = principio::findOrFail($id);
        
        // Lógica para validar y actualizar los datos del producto con los datos recibidos en la solicitud


        // Actualizar otros campos según tu estructura de base de datos
       
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombreportada = time() . '_' . $portada->getClientOriginalName();
            $portada->storeAs('public/images', $nombreportada);
            $principio->portada = 'storage/images/' . $nombreportada;
        }
        if ($request->hasFile('novedad1')) {
            $novedad1 = $request->file('novedad1');
            $nombrenovedad1 = time() . '_' . $novedad1->getClientOriginalName();
            $novedad1->storeAs('public/images', $nombrenovedad1);
            $principio->novedad1 = 'storage/images/' . $nombrenovedad1;
        }
        if ($request->hasFile('novedad2')) {
            $novedad2 = $request->file('novedad2');
            $nombrenovedad2 = time() . '_' . $novedad2->getClientOriginalName();
            $novedad2->storeAs('public/images', $nombrenovedad2);
            $principio->novedad2 = 'storage/images/' . $nombrenovedad2;
        }
        if ($request->hasFile('novedad3')) {
            $novedad3 = $request->file('novedad3');
            $nombrenovedad3 = time() . '_' . $novedad3->getClientOriginalName();
            $novedad3->storeAs('public/images', $nombrenovedad3);
            $principio->novedad3 = 'storage/images/' . $nombrenovedad3;
        }
        if ($request->hasFile('portada2')) {
            $portada2 = $request->file('portada2');
            $nombreportada2 = time() . '_' . $portada2->getClientOriginalName();
            $portada2->storeAs('public/images', $nombreportada2);
            $principio->portada2 = 'storage/images/' . $nombreportada2;
        }
        if ($request->hasFile('portada1')) {
            $portada1 = $request->file('portada1');
            $nombreportada1 = time() . '_' . $portada1->getClientOriginalName();
            $portada1->storeAs('public/images', $nombreportada1);
            $principio->portada1 = 'storage/images/' . $nombreportada1;
        }
        if ($request->hasFile('portada3')) {
            $portada3 = $request->file('portada3');
            $nombreportada3 = time() . '_' . $portada2->getClientOriginalName();
            $portada3->storeAs('public/images', $nombreportada3);
            $principio->portada3 = 'storage/images/' . $nombreportada3;
        }
        if ($request->hasFile('portada4')) {
            $portada4 = $request->file('portada4');
            $nombreportada4 = time() . '_' . $portada2->getClientOriginalName();
            $portada4->storeAs('public/images', $nombreportada4);
            $principio->portada4 = 'storage/images/' . $nombreportada4;
        }
    
    

        $principio->save();

        return redirect('/index')->with('success', 'principio actualizado correctamente');
    }
}

