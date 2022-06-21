<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Raza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class RazaController extends Controller
{
    public function index (){
        $razas = Raza::orderBy('presentacion','ASC')->get();
        $animales = Animal::where('estado','A')->get();
        $datos = [
            'razas' => $razas,
            'animales' => $animales,
        ];
        return view('raza.index',$datos);
    }

    public function store (Request $request){
        $raza = new Raza;
        $raza->animal_id = $request->animal_id;
        $raza->nombre = $request->nombre;
        if (isset($request->presentacion)){
            $raza->presentacion = $request->presentacion;
        }
        if (isset($request->imagen)){
            $raza->imagen = $request->file('imagen')->store('public/raza');
        }
        $raza->save();
        return redirect()->route('razas.index');
    }

    public function edit($id){
        $raza = Raza::find($id);
        $imagen = Storage::url($raza->imagen);
        $datos = [
            'raza' => $raza,
            'imagen' => $imagen,
        ];
        return Response::json($datos);
    }

    public function update ($id, Request $request){
        $raza = Raza::find($id);
        $raza->animal_id = $request->animal_id;
        $raza->nombre = $request->nombre;
        $raza->presentacion = $request->presentacion;
        $raza->estado = $request->estado;
        if (isset($request->imagen)){
            if (!empty($raza->imagen)){
                if (Storage::exists($raza->imagen)){
                    Storage::delete($raza->imagen);
                }
            }

            $raza->imagen = $request->file('imagen')->store('public/raza');
        }
        $raza->save();
        return redirect()->route('razas.index');
    }

    public function delete ($id){
        $raza = Raza::find($id);
        if ($raza->estado === 'I'){
            if (Storage::exists($raza->imagen)){
                Storage::delete($raza->imagen);
            }
            $raza->delete();
        }else{
            $raza->estado = 'I';
            $raza->save();
        }
        return redirect()->route('razas.index');
    }
}
