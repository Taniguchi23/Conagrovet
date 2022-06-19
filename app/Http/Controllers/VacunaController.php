<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;
use Response;

class VacunaController extends Controller
{
    public function index(){
        $vacunas = Vacuna::where('estado','A')->get();
        return view('vacuna.index',compact('vacunas'));
    }

    public function store (Request $request){
        $vacuna = new Vacuna;
        $vacuna->animal_id = $request->animal_id;
        $vacuna->producto_id = $request->producto_id;
        $vacuna->presentacion = $request->presentacion;
        $vacuna->save();
        return redirect()->route('vacuna.index');
    }

    public function  edit($id ){
        $vacuna = Vacuna::find($id);
        $datos = [
            'vacunas' => $vacuna,
        ];
        return Response::json($datos);
    }

    public function update ($id , Request$request){
        $vacuna = Vacuna::find($id);
        $vacuna->animal_id = $request->animal_id;
        $vacuna->producto_id = $request->producto_id;
        $vacuna->presentacion = $request->presentacion;
        $vacuna->estado = $request->estado;
        $vacuna->save();
        return redirect()->route('vacuna.index');
    }
    public function delete($id){
        $vacuna = Vacuna::find($id);
        if ($vacuna->estado === 'I'){
            $vacuna->delete();
        }else{
            $vacuna->estado = 'I';
            $vacuna->save();
        }
        return redirect()->route('vacuna.index');
    }
}
