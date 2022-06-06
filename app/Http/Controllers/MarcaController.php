<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::all();
        return view('marca.index',compact('marcas'));
    }

    public function store(Request $request){
        $marca = new Marca;
        $marca->nombre = $request->nombre;
        if (!empty($request->imagen)){
            $marca->imagen = $request->file('imagen')->store('public/marcas');
        }
        $marca->save();
        return redirect()->route('marcas.index');
    }

    public function edit($id){
        $marca = Marca::find($id);
        $imagen = Storage::url($marca->imagen);
        $datos = [
            'marca' => $marca,
            'imagen' => $imagen,
        ];
        return Response::json($datos);
    }

    public function update($id, Request $request){
        $marca = Marca::find($id);
        $marca->nombre = $request->nombre;
        if (!empty($request->imagen)){
            if ($marca->imagen === null){
                $marca->imagen = $request->file('imagen')->store('public/marcas');
            }else{
                if (Storage::exists($marca->imagen)){
                    Storage::delete($marca->imagen);
                }
                $marca->imagen = $request->file('imagen')->store('public/marcas');
            }
        }
        $marca->save();
        return redirect()->route('marcas.index');
    }

    public function delete($id){
        $marca = Marca::find($id);
        if (Storage::exists($marca->imagen)){
            Storage::delete($marca->imagen);
        }
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
