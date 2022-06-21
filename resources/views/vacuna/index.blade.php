@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Vacunas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Registros</li>
                <li class="breadcrumb-item active">Vacunas</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de Vacunas</h5>
                                </div>

                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear"  data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Vacuna</button>
                                </div>

                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Animal</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Orden</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vacunas as $ids => $vacuna)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$vacuna->animal->nombre}}</td>
                                    <td>{{$vacuna->producto->nombre}}</td>
                                    <td>{{$vacuna->presentacion}}</td>
                                    <td><span class="rounded-3 p-1 bg-{{Util::colorEstado($vacuna->estado)}} text-white">{{Util::stringEstado($vacuna->estado)}}</span></td>
                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$vacuna->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('vacunas.delete',$vacuna->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Nueva Vacuna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('vacunas.store')}}" method="post" id="formulario">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Animal</label>
                                    <select class="form-select" id="animal_id" name="animal_id" required>
                                        @foreach($animales as $animal)
                                            <option value="{{$animal->id}}">{{$animal->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Producto</label>
                                    <select class="form-select" id="producto_id" name="producto_id" required>
                                        @foreach($productos as $producto)
                                            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault05" class="form-label">Orden de Presentación</label>
                                    <input type="number" class="form-control" id="presentacion" name="presentacion" min="1" >
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
            let val_url = '/vacunas/edit/'+val_id;
            let val_url_update = '/vacunas/update/'+val_id;
            $.get(val_url, function (res){
                console.log(res);
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Editar Producto');
                $('#animal_id').val(res.animal_id);
                $('#producto_id').val(res.producto_id);
                $('#presentacion').val(res.presentacion);
                $('#divEstado').css('display','block');
                $('#estado').val(res.estado);
                $('.btnGuardar').html('Editar');
                $('#modalDatos').modal('show');
            });
        });

        $('.btnCrear').click(function (){
            let val_url_store = '/vacunas/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Producto Nuevo');
            $('#animal_id option:first').prop('selected',true);
            $('#producto_id option:first').prop('selected',true);
            $('#divEstado').css('display','none');
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
    </script>
@endsection
