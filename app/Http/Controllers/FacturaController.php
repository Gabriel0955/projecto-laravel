<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;



class FacturaController extends Controller
{
    public function generarFactura($id)
    {
        // Obtén los datos necesarios para la factura, por ejemplo, desde el modelo Venta
        $venta = Ventas::findOrFail($id);

        // Genera la vista de la factura y pasa los datos necesarios
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('trabajo.facturas.factura', compact('venta'));

        // Descarga el PDF (puedes cambiar 'factura.pdf' al nombre que desees)
        return $pdf->download('factura.pdf');
    }
}
