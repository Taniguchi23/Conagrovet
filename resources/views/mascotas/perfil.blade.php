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

                        <img src="/storage/raza/avatar.jpg" alt="Profile" class="rounded-circle">
                        <h2>{{$mascota->nombre}}</h2>
                        <h3>{{$mascota->raza->nombre}}</h3>
                        <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
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

                            <!-- <li class="nav-item">
                              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li> -->

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-8 mt-2"><h5 class="text-success">Detalles del Perro</h5></div>
                                    <div class="col-lg-3 col-md-3 col-sm-4 d-flex">
                                        <button type="button" class="btn btn-success">Exportar <i class="bi bi-file-earmark-pdf-fill"></i> </button>
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

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">

                                    </div>


                                </form><!-- End Profile Edit Form -->

                            </div>



                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
