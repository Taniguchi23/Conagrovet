<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Response;

class AnimalController extends Controller
{
    public function index(){
        $animales = Animal::orderBy('estado','ASC')->get();
        return view('animales.index', compact('animales'));
    }

    public function store(Request $request){
        $animal = new Animal;
        $animal->nombre = $request->tipo;
        $animal->save();
        return redirect()->route('animales.index');
    }

    public function edit($id){
        $animal = Animal::find($id);
        return Response::json($animal);
    }

    public function update($id, Request $request){
        $animal = Animal::find($id);
        $animal->nombre = $request->tipo;
        $animal->estado = $request->estado;
        $animal->save();
        return redirect()->route('animales.index');
    }

    public function delete($id){
        $animal = Animal::find($id);
        if ($animal->estado === 'I'){
            $animal->delete();
        }else{
            $animal->estado = 'I';
            $animal->save();
        }
        return redirect()->route('animales.index');
    }


}
