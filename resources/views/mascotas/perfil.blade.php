@extends('layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Perfil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Perros</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{Storage::url($mascota->imagen)}}" alt="Profile" class="rounded-circle">
                        <h2>{{$mascota->nombre}}</h2>
                        <h3>{{$mascota->raza->nombre}}</h3>
                        <div class="pt-2">
                            <button type="button" class="btn btn-primary btn-sm" title="Cambiar imagen del engreído" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-upload"></i></button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Vista General</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Historial</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Vacunas</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-8 mt-2"><h5 class="text-success">Detalles del {{$mascota->raza->animal->nombre}}</h5></div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 d-flex">
                                        <a href="{{route('mascotas.pdf', $mascota->id)}}" class="btn btn-success">Exportar <i class="bi bi-file-earmark-pdf-fill"></i> </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Código</div>
                                    <div class="col-lg-9 col-md-8">{{$mascota->id}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tipo</div>
                                    <div class="col-lg-9 col-md-8">{{$mascota->raza->animal->nombre}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Raza</div>
                                    <div class="col-lg-9 col-md-8">{{$mascota->raza->nombre}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Sexo</div>
                                    <div class="col-lg-9 col-md-8">{{Util::stringSexo($mascota->sexo)}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                    <div class="col-lg-9 col-md-8">{{$mascota->nombre}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fecha de nacimiento</div>
                                    <div class="col-lg-9 col-md-8">{{Util::formatoFecha($mascota->fecha_nacimiento)}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Peso</div>
                                    <div class="col-lg-9 col-md-8">{{$mascota->peso}} Kg.</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Esterelizado</div>
                                    <div class="col-lg-9 col-md-8">{{Util::stringEsteril($mascota->esterilizado)}}</div>
                                </div>


                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Lista del Historial</h5>

                                        <!-- List group with Links and buttons -->
                                        <div class="list-group">
                                            @foreach($citas as $cita)
                                            <a href="" class="list-group-item list-group-item-action active" aria-current="true">
                                                {{$cita->nombre}} - {{Util::formatoFecha($cita->fecha_programacion)}}
                                            </a>
                                            @endforeach
                                        </div><!-- End List group with Links and buttons -->

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-settings">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Vacunas de {{$mascota->nombre}}</h5>
                                        <p>Si<code> va a viajar y necesita un comprobante de las vacunas</code> solicitelo con nosotros. </p>

                                        <!-- List group with active and disabled items -->
                                        <ul class="list-group list-group-flush">
                                            @foreach($listaVacunas as $ids => $vacunas)
                                            <li class="list-group-item">{{$vacunas['nombre']}} - <span class="text-success fw-bold">Código: {{$vacunas['codigo']}}</span> </li>
                                            @endforeach
                                        </ul><!-- End Clean list group -->

                                    </div>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('mascota.foto')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="mascota_id" value="{{$mascota->id}}">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="file" name="imagen">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Basic Modal-->
@endsection
