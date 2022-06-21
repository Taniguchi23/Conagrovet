<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class AdminController extends Controller
{
    public function consultas(){
        $consultas = Consulta::all();
        return view('admin.consultas', compact('consultas'));
    }

    public function consultasEdit($id){
        $consulta = Consulta::find($id);
        return Response::json($consulta);
    }

    public function consultasUpdate($id, Request $request){
        $consulta = Consulta::find($id);
        $consulta->nombre = $request->nombre;
        $consulta->email = $request->email;
        $consulta->descripcion = $request->descripcion;
        $consulta->estado = $request->estado;
        $consulta->save();
        return redirect()->route('admin.consultas');
    }

    public function cambio($id){
        $consulta = Consulta::find($id);
        if ($consulta->estado === 'P'){
            $consulta->estado = 'R';
        }else{
            $consulta->estado = 'P';
        }
        $consulta->save();
        return redirect()->route('admin.consultas');
    }

    public function verificarDni($dni){
        $user = User::where('dni',$dni)->first();
        if (empty($user)){
            $response = 'ok';
        }else{
            $response = 'error';
        }
        return Response::json($response);
    }
}
