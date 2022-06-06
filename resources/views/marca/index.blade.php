@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Marcas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Registros</li>
                <li class="breadcrumb-item active">Marcas</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de Marcas</h5>
                                </div>
                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear" data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Marca</button>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($marcas as $ids => $marca)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$marca->nombre}}</td>
                                    <td><img src="{{Storage::url($marca->imagen)}}" alt="" width="80px"></td>
                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$marca->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('marcas.delete',$marca->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Nueva Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('marcas.store')}}" method="post" id="formulario" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name"  name="nombre" value="" required>
                                </div>
                                <div class="col-md-12">
                                    <img class="m-2 text-center" id="imagenVieja" src="" alt="" width="120px" style="display:none">
                                    <label for="validationDefault02" id="imagenLabel" class="form-label">Imagen</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" required>
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
            let val_url = '/marcas/edit/'+val_id;
            let val_url_update = '/marcas/update/'+val_id;
            $.get(val_url, function (res){
                let imagen = res.imagen;
                console.log(res);
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Editar Marca');
                $('#name').val(res.marca.nombre);
                $('#imagenLabel').css('display','none')
                $('#imagenVieja').css('display','block');
                $('#imagenVieja').attr('src',imagen);
                $('#imagen').attr('required',false);
                $('.btnGuardar').html('Editar');
                $('#modalDatos').modal('show');
            });
        });

        $('.btnCrear').click(function (){
            $('#name').val('');
            $('#imagen').val('');
            $('#imagenLabel').css('display','block')
            $('#imagenVieja').css('display','none');
            $('.btnGuardar').html('Guardar');
        });
    </script>
@endsection
