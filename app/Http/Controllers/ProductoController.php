<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Response;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::orderBy('estado','ASC')->get();
        $marcas = Marca::all();
        $datos = [
            'productos' => $productos,
            'marcas' => $marcas
        ];
        return view('producto.index',$datos);
    }

    public function store(Request $request){
        $producto = new Producto;
        $producto->marca_id = $request->marca;
        $producto->nombre = $request->nombre;
        $producto->codigo_factura = $request->codigoFactura;
        $producto->cantidad = $request->cantidad;
        $producto->unidad = $request->unidad;
        $producto->save();
       return redirect()->route('productos.index');
    }

    public function edit($id){
        $producto = Producto::find($id);
        $marcas = Marca::all();
        $datos = [
            'producto' => $producto,
            'marca' => $marcas,
        ];

        return Response::json($datos);
    }

    public function update($id, Request $request){
        $producto = Producto::find($id);
        $producto->marca_id = $request->marca;
        $producto->nombre = $request->nombre;
        $producto->codigo_factura = $request->codigoFactura;
        $producto->cantidad = $request->cantidad;
        $producto->unidad = $request->unidad;
        $producto->estado = $request->estado;
        $producto->save();
        return redirect()->route('productos.index');
    }


}
