@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Formulario de Cita</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Pacientes</li>
                <li class="breadcrumb-item active">Cita</li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Conagrovet : Cita N° {{Util::formatoCita($cita->id)}}</h5>

                <!-- General Form Elements -->
                <form >

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Propietario</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{$cita->mascota->user->name}}" readonly>
                        </div>
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" value="{{$cita->mascota->user->email}}" readonly>
                        </div>
                    </div>
                    <h5 class="card-title text-center">Datos de {{$cita->mascota->nombre}} <span>({{$cita->mascota->raza->animal->nombre}})</span></h5>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label>Raza</label>
                            <input type="test" class="form-control" value="{{$cita->mascota->raza->nombre}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label>Color</label>
                            <input type="test" class="form-control" value="{{$cita->mascota->color}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label>Esterilizado</label>
                            <input type="test" class="form-control" value="{{Util::stringEsteril($cita->mascota->esterilizado)}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >Sexo</label>
                            <input type="text" class="form-control" value="{{Util::stringSexo($cita->mascota->sexo)}}"readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label >Peso</label>
                            <input type="text" class="form-control" value="{{$cita->mascota->peso}} Kg."readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >Fecha del Pesado</label>
                            <input type="text" class="form-control" value="{{Util::formatoFecha($cita->mascota->updated_at === null ? $cita->mascota->updated_at : $cita->mascota->updated_at)}} "readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >Fecha de Nacimiento</label>
                            <input type="text" class="form-control" value="{{Util::formatoFecha($cita->mascota->fecha_nacimiento)}}"readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label >Peso Kg.</label>
                            <input type="number" min="0.001" step="0.001" class="form-control" name="peso" value="{{$file->peso}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >Frec. Cardiaca (1min) </label>
                            <input type="number" min="0" step="0.001" class="form-control" name="f_card" value="{{$file->f_card}}"readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >Frec. Respiratoria (1min)</label>
                            <input type="number" min="0" step="0.001" class="form-control" name="f_resp" value="{{$file->f_resp}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label >TPC</label>
                            <input type="number" min="0" step="0.01" class="form-control" name="tpc" value="{{$file->tpc}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Diagnóstico</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" required name="diagnostico" readonly>{{$file->diagnostico}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="descripcion" readonly>{{$file->descripcion}}</textarea>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">¿Se vacunará al paciente?</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radioNo" value="option1" {{$file->tratamiento ==='S'? '': 'checked'}} disabled>
                                <label class="form-check-label" for="gridRadios1">
                                    No
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radioSi" value="option2" {{$file->tratamiento ==='S'? 'checked': ''}} disabled>
                                <label class="form-check-label" for="gridRadios2">
                                    Si
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="cita_id" value="{{$cita->id}}" id="citaId">
                   @if($file->tratamiento === 'S')
                        <div class="row mb-3" id="divVacunas" >
                            <label class="col-sm-2 col-form-label">Vacunas</label>
                            <div class="col-sm-6">
                                <select class="form-select" id="listaVacunas" name="vacuna" aria-label="Default select example" disabled>
                                    <option value="">{{$tratamiento->vacuna->producto->nombre}}</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label>Código de la vacuna</label>
                                <input type="test" class="form-control" name="codigo" value="{{$tratamiento->codigo}}" readonly>
                            </div>
                        </div>
                    @endif
                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>
@endsection
@section('script')
<script>
    $('#radioSi').click(function (){
        $('#divVacunas').css('display','block');
        let val_cita = $('#citaId').val();
        let val_url = '/pacientes/citas/listavacunas/'+val_cita;
        $.get(val_url, function (res){
            $('#listaVacunas').html(res);
        });
    });

    $('#radioNo').click(function (){
        $('#divVacunas').css('display','none');
    });
</script>

@endsection
