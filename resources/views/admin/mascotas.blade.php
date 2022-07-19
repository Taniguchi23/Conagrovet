@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Mascotas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Pacientes</li>
                <li class="breadcrumb-item active">Mascotas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <h5 class="card-title mt-2 ml-2">Lista de Mascotas</h5>
                                </div>

                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear"  data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Mascota</button>
                                </div>

                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Dueño</th>
                                <th scope="col">Estado</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mascotas as $ids => $mascota)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$mascota->raza->animal->nombre}}</td>
                                    <td>{{$mascota->nombre}}</td>
                                    <td><img src="{{Storage::url($mascota->imagen)}}" width="50px" alt=""></td>
                                    <td>{{$mascota->user->name}}</td>
                                    <td><span class="rounded-3 p-1 bg-{{Util::colorMascota($mascota->estado)}} text-white">{{Util::stringMascota($mascota->estado)}}</span></td>

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

    <!-- Modal -->
    <div class="modal fade" id="modalDatos" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Nueva Raza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.mascotas.store')}}" method="post" id="formulario" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"  name="nombre" value="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Tipo de animal</label>
                                    <select class="form-select" id="raza_id" name="raza_id" required>
                                        @foreach($razas as $raza)
                                            <option value="{{$raza->id}}">{{$raza->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mb-12">
                                    <label for="inputDate" class="col-sm-12 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-sm-6">
                                        <input type="datetime-local" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault05" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"  >
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault05" class="form-label">Peso</label>
                                    <input type="number" min="1" step="0.001"class="form-control" id="peso" name="peso">
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Tipo de animal</label>
                                    <select class="form-select" id="user_" name="user_id" required>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6" >
                                    <label for="validationDefault05" class="form-label">Sexo</label>
                                    <select class="form-select" name="sexo" id="sexo">
                                        <option value="M">Macho</option>
                                        <option value="H">Hembra</option>
                                    </select>
                                </div>
                                <div class="col-md-6" >
                                    <label for="validationDefault05" class="form-label">Esterilizado</label>
                                    <select class="form-select" name="esterilizado" id="esterilizado">
                                        <option value="N">No</option>
                                        <option value="S">Si</option>
                                    </select>
                                </div>
                                <div id="divEstado" class="col-md-6" style="display: none">
                                    <label for="validationDefault05" class="form-label">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
                                        <option value="V">Activo</option>
                                        <option value="F">Inactivo</option>
                                    </select>
                                </div>
                                <div class="row mb-3 mt-3" id="divImagen" style="display: none">
                                    <div class="col-sm-10 text-center">
                                        <img id="avatar" width="120px" src="" alt="">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="imagen" name="imagen">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btnGuardar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('#tabla').on('click','.btnEditar',function (){
            let val_id = $(this).data('id');
            let val_url = '/razas/edit/'+val_id;
            let val_url_update = '/razas/update/'+val_id;
            $.get(val_url, function (res){
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Editar Raza');
                $('#nombre').val(res.raza.nombre);
                $('#presentacion').val(res.raza.presentacion);
                if(res.raza.imagen != null){
                    $('#divImagen').css('display','block');
                    $('#avatar').attr('src',res.imagen);
                }
                $('#divEstado').css('display','block');
                $('#estado').val(res.raza.estado);
                $('.btnGuardar').html('Editar');
                $('#modalDatos').modal('show');
            });
        });

        $('.btnCrear').click(function (){
            let val_url_store = '/admin/mascota/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Nueva Mascota');
            $('#nombre').val('');
            $('#color').val('');
            $('#peso').val('');
            $('#divEstado').css('display','none');
            $('#divImagen').css('display','none');
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
    </script>
@endsection
