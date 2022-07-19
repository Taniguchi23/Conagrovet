<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\File;
use App\Models\Mascota;
use App\Models\Raza;
use App\Models\Tratamiento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PerroController extends Controller
{

    public function lista(){
        $idUser = Auth::user()->id;
        $mascotas = Mascota::where('user_id',$idUser)->orderBy('estado','DESC')->get();
        return view('mascotas.index',compact('mascotas'));
    }


    public function perfil ($id){
        $mascota = Mascota::find($id);
        $citas = Cita::where('mascota_id',$mascota->id)
            ->where('estado','F')->orderBy('fecha_programacion','DESC')->get();
        $listaVacunas = [];
        foreach ($citas as $cita){
            $file = File::where('cita_id',$cita->id)->first();
            if ($file->tratamiento == 'S'){
                echo "si";
                $tratamientos = Tratamiento::where('file_id',$file->id)->get();
                foreach ($tratamientos as $tratamiento){
                    $listaVacunas[] = [
                        'nombre' => $tratamiento->vacuna->producto->nombre,
                        'codigo' => $tratamiento->codigo,
                ];
                }

            }
        }

        $datos = [
          'mascota' => $mascota,
            'citas' => $citas,
            'listaVacunas' => $listaVacunas,
        ];
        return view('mascotas.perfil', $datos);
    }

    public function subirFoto (Request $request){
        $mascota = Mascota::find($request->mascota_id);
        $mascota->imagen = $request->file('imagen')->store('public/pacientes');
        $mascota->save();
        return redirect()->route('mascotas.lista');
    }

    public function pdf($id){
        $mascota = Mascota::find($id);
        $citas = Cita::where('mascota_id',$mascota->id)
            ->where('estado','F')->orderBy('fecha_programacion','DESC')->get();
        $listaVacunas = [];
        foreach ($citas as $cita){
            $file = File::where('cita_id',$cita->id)->first();
            if ($file->tratamiento == 'S'){
                echo "si";
                $tratamientos = Tratamiento::where('file_id',$file->id)->get();
                foreach ($tratamientos as $tratamiento){
                    $listaVacunas[] = [
                        'nombre' => $tratamiento->vacuna->producto->nombre,
                        'codigo' => $tratamiento->codigo,
                    ];
                }

            }
        }

        $datos = [
            'mascota' => $mascota,
            'citas' => $citas,
            'listaVacunas' => $listaVacunas,
        ];
        $pdf = PDF::loadView('pdf',$datos);
        return $pdf->download('Perfil.pdf');
    }

}
