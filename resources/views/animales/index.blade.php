@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Tipos de animales</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Registros</li>
                <li class="breadcrumb-item active">Tipos</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de tipos de animales</h5>
                                </div>

                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear"  data-bs-toggle="modal" data-bs-target="#modalDatos">Crear tipos</button>
                                </div>

                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animales as $ids => $animal)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$animal->nombre}}</td>
                                    <td><span class="rounded-3 p-1 bg-{{Util::colorEstado($animal->estado)}} text-white">{{Util::stringEstado($animal->estado)}}</span></td>
                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$animal->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('animales.delete',$animal->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Nuevo tipo de animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('animales.store')}}" method="post" id="formulario">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Tipo de animal</label>
                                    <input type="text" class="form-control" id="tipo"  name="tipo" value="" required>
                                </div>
                                <div id="divEstado" class="col-md-6" style="display: none">
                                    <label for="validationDefault05" class="form-label">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
                                    </select>
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
            let val_url = '/animales/edit/'+val_id;
            let val_url_update = '/animales/update/'+val_id;
            $.get(val_url, function (res){
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Editar tipo de animales');
                $('#tipo').val(res.nombre);
                $('#divEstado').css('display','block');
                $('#estado').val(res.estado);
                $('.btnGuardar').html('Editar');
                $('#modalDatos').modal('show');
            });
        });

        $('.btnCrear').click(function (){
            let val_url_store = '/animales/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Nuevo tipo de animal');
            $('#tipo').val('');
            $('#divEstado').css('display','none')
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
    </script>
@endsection

