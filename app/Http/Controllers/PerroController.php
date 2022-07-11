<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerroController extends Controller
{
    public function index(){
        return view('mascotas.index');
    }

    public function lista(){
        $idUser = Auth::user()->id;
        $mascotas = Mascota::where('user_id',$idUser)->orderBy('estado','DESC')->get();
        return view('mascotas.index',compact('mascotas'));
    }

    public function perfil ($id){
        $mascota = Mascota::find($id);
        return view('mascotas.perfil', compact('mascota'));
    }


}
