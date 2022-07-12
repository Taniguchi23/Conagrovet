<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\File;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\User;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use Response;

class DoctorController extends Controller
{
    public function index(){

        $diaActual = date('Y-m-d 23:59:59');
        $citas = Cita::orderBy('estado','ASC')->orderBy('fecha_programacion','DESC')->get();
        $datos = [
            'citas' => $citas,
        ];
        return view('paciente.citas', $datos);
    }

    public function atender($id){
        $cita = Cita::find($id);
        return view('paciente.atender', compact('cita'));
    }

    public function historial(){
        return view('paciente.historial');
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
        $cita->estado = $request->estado;
        $cita->save();

        return redirect()->route('pacientes.citas');
    }

    public function atencionStore(Request $request){
        $file = new File;
        $file->cita_id = $request->cita_id;
        $file->peso = $request->peso;
        $file->f_card = $request->f_card;
        $file->f_resp = $request->f_resp;
        $file->tpc = $request->tpc;
        $file->diagnostico = $request->diagnostico;
        $file->descripcion = $request->descripcion;
        $file->tratamiento = $request->radio == 'option2' ? 'S' : 'N';
        $file->save();
        if ($file->tratamiento == 'S'){
            $tratamiento = new Tratamiento;
            $tratamiento->file_id = $file->id;
            $tratamiento->vacuna_id = $request->vacuna;
            $tratamiento->cantidad = 1;
            $tratamiento->codigo = $request->codigo;
            $tratamiento->save();
        }
        $cita = Cita::find($file->cita_id);
        $cita->estado = 'F';
        $cita->save();
        return redirect()->route('pacientes.citas');
    }

    public function verCita($id){
        $cita = Cita::find($id);
        $file = File::where('cita_id',$cita->id)->first();
        $tratamiento = Tratamiento::where('file_id',$file->id)->first();
        $datos = [
            'cita' => $cita,
            'file' => $file,
            'tratamiento' => $tratamiento,
        ];
        return view('paciente.ver',$datos);
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

    public function listaVacuna($cita_id){
        $cita = Cita::find($cita_id);
        $tipoAnimal = $cita->mascota->raza->animal->id;
        $vacunas = Vacuna::where('animal_id',$tipoAnimal)->get();
        $html = '<option selected disabled value="">Seleccione una vacuna</option>';
        foreach ($vacunas as $vacuna){
            $temp = '<option value="'.$vacuna->id.'">'.$vacuna->producto->nombre.'</option>';
            $html = $html . $temp;
        }
        return Response::json($html);
    }

    public function listaHistorial($id){
        $mascota = Mascota::find($id);
        if (empty($mascota)){
            $response = 'error';
        }else{
            $citas = Cita::where('mascota_id',$mascota->id)->orderBy('fecha_programacion','DESC')->get();
            if ($citas->isEmpty()){
                $response = 'error';
            }else{
                $html = '';
                foreach ($citas as $ids => $cita){
                    $fecha_programacion = \Util::formatoFecha($cita->fecha_programacion);
                    $cita_estado_color = \Util::estadoColorCita($cita->estado);
                    $cita_estado_string = \Util::estadoStringCita($cita->estado);
                    if ($cita->estado != 'F'){
                        $temp = '<tr>
                                <th scope="row">'.($ids+1).'</th>
                                <td>'.$cita->nombre.'</td>
                                <td>'.$cita->mascota->nombre.'</td>
                                <td>'.($fecha_programacion ).'</td>
                                <td><span class="btn btn-'.($cita_estado_color).'">'.($cita_estado_string ).'</span></td>
                                <td><a class="text-danger" href="/pacientes/atender/'.$cita->id.'" ><i class="bi bi-play-circle-fill"></i></a></td>';
                    }else{
                        $temp = '<tr>
                                <th scope="row">'.($ids+1).'</th>
                                <td>'.$cita->nombre.'</td>
                                <td>'.$cita->mascota->nombre.'</td>
                                <td>'.($fecha_programacion ).'</td>
                                <td><span class="btn btn-'.($cita_estado_color).'">'.($cita_estado_string ).'</span></td>
                                <td><a class="text-primary" href="/pacientes/citas/ver/'.$cita->id.'"><i class="bi bi-eye-fill"></i></a></td>';
                    }
                    $html = $html . $temp;
                }
                $response = $html;
            }

        }

        return Response::json($response);
    }
}
