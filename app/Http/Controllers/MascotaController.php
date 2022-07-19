<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Mascota;
use App\Models\Raza;
use App\Models\User;
use Illuminate\Http\Request;

class MascotaController extends Controller
{

    public function  index(){
        $mascotas =  Mascota::all();
        $razas = Raza::all();
        $users = User::all();
        $datos = [
            'mascotas' => $mascotas,
            'razas' => $razas,
            'users' => $users
        ];
        return view('admin.mascotas', $datos);
    }
    public function store(Request $request){
        $mascota = new Mascota;
        $mascota->user_id = $request->user_id;
        $mascota->raza_id = $request->raza_id;
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->peso = $request->peso;
        $mascota->color = $request->color;
        $mascota->descripcion = $request->descripcion;
        $mascota->esterilizado = $request->esterilizado;
        if (isset($request->imagen)){
            $mascota->imagen = $request->file('imagen')->store('public/pacientes');
        }else{
            $raza =  Raza::find($request->raza_id);
            $mascota->imagen = $raza->imagen;
        }
        $mascota->save();
        return redirect()->route('admin.mascotas.index');
    }
    
}
