<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use Response;

class DoctorController extends Controller
{
    public function index(){
        $diaActual = date('Y-m-d 23:59:59');
        $citas = Cita::where('estado','!=','I')
            ->where('fecha_programacion','<',$diaActual)->get();
        $datos = [
            'citas' => $citas,
        ];
        return view('paciente.citas', $datos);
    }

    public function atender($id){
        $cita = Cita::find($id);
        return view('paciente.atender');
    }

    public function historial(){

    }

    public function ver(){

    }

    public function store(Request $request){
        $cita = new Cita;
        $cita->mascota_id = $request->mascota_id;
        $cita->nombre = $request->nombre;
        $cita->descripcion = $request->descripcion;
        $cita->fecha_programacion = $request->fecha_programacion;
        $cita->save();

        return redirect()->route('pacientes.citas');
    }

    public function edit($id){
        $cita = Cita::find($id);
        $datos = [
            'email' => $cita->mascota->user->email,
            'cita' => $cita->nombre,
            'descripcion' => $cita->descripcion,
            'mascota_id' => $cita->mascota_id,
            'fecha_programacion' => $cita->fecha_programacion,
            'estado' => $cita->estado,
        ];
        return Response::json($datos);
    }

    public function update(Request $request, $id){
        $cita = Cita::find($id);
        $cita->mascota_id = $request->mascota_id;
        $cita->nombre = $request->nombre;
        $cita->descripcion = $request->descripcion;
        $cita->fecha_programacion = $request->fecha_programacion;
        $cita->save();

        return redirect()->route('pacientes.citas');
    }

    public function listaMascota($email){
        $user = User::where('email',$email)->first();
        if(empty($user)){
            $response= 'error';
        }else{
            $mascotas = Mascota::where('user_id',$user->id)->get();

            if ($mascotas->isEmpty()){
                $response = '<option selected disabled value="">No tiene Mascota</option>';
            }else{
                $html = '<option selected disabled value="">Mascota...</option>';
                foreach ($mascotas as $mascota){
                    $temp = '<option value="'.$mascota->id.'">'.$mascota->nombre.'</option>';
                    $html = $html . $temp;
                }
                $response = $html;
            }
        }
        return Response::json($response);
    }
}
