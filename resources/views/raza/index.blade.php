@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Razas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Registros</li>
                <li class="breadcrumb-item active">Razas</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de Razas</h5>
                                </div>

                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear"  data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Raza</button>
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
                                <th scope="col">Orden</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($razas as $ids => $raza)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$raza->animal->nombre}}</td>
                                    <td>{{$raza->nombre}}</td>
                                    <td><img src="{{Storage::url($raza->imagen)}}" width="50px" alt=""></td>
                                    <td>{{$raza->presentacion}}</td>
                                    <td><span class="rounded-3 p-1 bg-{{Util::colorEstado($raza->estado)}} text-white">{{Util::stringEstado($raza->estado)}}</span></td>

                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$raza->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('razas.delete',$raza->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="modalDatos" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Nueva Raza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('razas.store')}}" method="post" id="formulario" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Raza</label>
                                    <input type="text" class="form-control" id="nombre"  name="nombre" value="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Tipo de animal</label>
                                    <select class="form-select" id="animal_id" name="animal_id" required>
                                        @foreach($animales as $animal)
                                            <option value="{{$animal->id}}">{{$animal->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault05" class="form-label">Orden de Visualización</label>
                                    <input type="number" class="form-control" id="presentacion" name="presentacion" min="1" >
                                </div>

                                <div id="divEstado" class="col-md-6" style="display: none">
                                    <label for="validationDefault05" class="form-label">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
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
            let val_url_store = '/razas/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Nueva Raza');
            $('#nombre').val('');
            $('#presentacion').val('');
            $('#divEstado').css('display','none');
            $('#divImagen').css('display','none');
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
    </script>
@endsection
