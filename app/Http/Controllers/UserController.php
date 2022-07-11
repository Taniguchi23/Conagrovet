<?php

namespace App\Http\Controllers;

use App\Helpers\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends Controller
{

    public function index ($tipo){
        $tipo = \Util::obtenerPrimeraLetra($tipo);
        if ($tipo === 'I'){
            $usuarios = User::where('estado','I')->get();
        }else{
            $usuarios = User::where('tipo',$tipo)->where('estado','A')->get();
        }


        $datos = [
            'tipo' => $tipo,
            'usuarios' => $usuarios,
        ];

        return view('usuario.index',$datos);
    }

    public function store(Request $request){
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;
        $usuario->sexo = $request->sexo;
        if ($request->sexo === 'H'){
            if ($request->role === 'C'){
                $usuario->imagen = 'public/avatar/cliente_hombre';
            }else{
                $usuario->image = 'public/avatar/doctor_hombre';
            }
        }else{
            if ($request->role === 'C'){
                $usuario->imagen = 'public/avatar/cliente_mujer';
            }else{
                $usuario->image = 'public/avatar/doctor_mujer';
            }
        }
        $usuario->password = Hash::make($request->password);
        $usuario->telefono = $request->telefono;
        $usuario->tipo = $request->role;
        $usuario->dni = $request->dni;
        $usuario->direccion = $request->direccion;
        $usuario->save();
        $tipo = Util::obtenerTipoUsuario($request->role);
        return redirect()->route('usuarios.index',$tipo);
    }

    public function edit ($id){
        $usuario = User::find($id);
        return Response::json($usuario);
    }

    public function update ($id, Request $request){
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->email = $request->email;
        if (!empty($request->password)){
            $usuario->password = Hash::make($request->password);
        }
        $usuario->telefono = $request->telefono;
        $usuario->tipo = $request->role;
        $usuario->dni = $request->dni;
        $usuario->sexo =$request->sexo;
        if ($request->sexo === 'H'){
            if ($request->role === 'C'){
                $usuario->imagen = 'public/avatar/cliente_hombre';
            }else{
                $usuario->image = 'public/avatar/doctor_hombre';
            }
        }else{
            if ($request->role === 'C'){
                $usuario->imagen = 'public/avatar/cliente_mujer';
            }else{
                $usuario->image = 'public/avatar/doctor_mujer';
            }
        }
        $usuario->direccion = $request->direccion;
        $usuario->estado = $request->estado;
        $usuario->save();
        $tipo = Util::obtenerTipoUsuario($request->role);
        return redirect()->route('usuarios.index',$tipo);
    }

    public function delete ($id){
        $usuario = User::find($id);
        if ($usuario->estado === 'A'){
            $usuario->estado = 'I';
            $usuario->save();
            $tipo = $usuario->tipo;
        }else{
            $usuario->delete();
            $tipo = \Util::obtenerTipoUsuario('I');
        }
        return redirect()->route('usuarios.index',$tipo);
    }
}
