<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Producto;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use Response;

class VacunaController extends Controller
{
    public function index(){
        $vacunas = Vacuna::orderBY('estado','ASC')->get();
        $animales = Animal::where('estado','A')->get();
        $productos = Producto::where('estado','A')->get();
        $datos = [
            'vacunas' => $vacunas,
            'animales' => $animales,
            'productos' => $productos,
        ];
        return view('vacuna.index',$datos);
    }

    public function store (Request $request){
        $vacuna = new Vacuna;
        $vacuna->animal_id = $request->animal_id;
        $vacuna->producto_id = $request->producto_id;
        $vacuna->presentacion = $request->presentacion;
        $vacuna->save();
        return redirect()->route('vacunas.index');
    }

    public function  edit($id ){
        $vacuna = Vacuna::find($id);

        return Response::json($vacuna);
    }

    public function update ($id , Request$request){
        $vacuna = Vacuna::find($id);
        $vacuna->animal_id = $request->animal_id;
        $vacuna->producto_id = $request->producto_id;
        $vacuna->presentacion = $request->presentacion;
        $vacuna->estado = $request->estado;
        $vacuna->save();
        return redirect()->route('vacunas.index');
    }
    public function delete($id){
        $vacuna = Vacuna::find($id);
        if ($vacuna->estado === 'I'){
            $vacuna->delete();
        }else{
            $vacuna->estado = 'I';
            $vacuna->save();
        }
        return redirect()->route('vacunas.index');
    }
}
