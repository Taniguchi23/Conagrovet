<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Response;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function quienes(){
        return view('web.quienes');
    }
    public function servicios(){
        return view('web.servicios');
    }
    public function contactos(){
        return view('web.contactos');
    }
    public function familia(){
        return view('web.familia');
    }
    public function autentificacions(){
        return view('web.autentificacion');
    }

    public function bot(){
        return view( 'bot');
    }

    public function consultas (Request $request){
        $response = '';
        $consulta = new Consulta;
        $consulta->nombre = $request->nombre;
        $consulta->email = $request->email;
        $consulta->descripcion = $request->descripcion;
        if ($consulta->save()){
            $response = 'ok';
        }
        return Response::json($response);

    }
}
