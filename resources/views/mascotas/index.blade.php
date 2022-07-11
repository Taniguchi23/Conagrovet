@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Mis Mascotas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Mascotas</li>
                <li class="breadcrumb-item active">Lista de mascotas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mascotas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mascotas as $ids => $mascota)
                            <tr>
                                <th scope="row">{{$ids+1}}</th>
                                <td>{{$mascota->nombre}}</td>
                                <td>{{Util::stringSexo($mascota->sexo)}}</td>
                                <td><span class="rounded-3 p-1 bg-{{Util::colorMascota($mascota->estado)}} text-white">{{Util::stringMascota($mascota->estado)}}</span></td>
                                <td>
                                    <a t href="{{route('mascotas.perfil',$mascota->id)}}"><i class="bi bi-eye-fill btn btn-primary"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
