@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Citas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Pacientes</li>
                <li class="breadcrumb-item active">Citas</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de Citas</h5>
                                </div>
                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear" data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Cita</button>
                                </div>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cita</th>
                                <th scope="col">Mascota</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($citas as $ids => $cita)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$cita->nombre}}</td>
                                    <td>{{$cita->mascota->nombre}}</td>
                                    <td>{{Util::formatoFecha($cita->fecha_programacion)}}</td>
                                    <td><span class="btn btn-{{Util::estadoColorCita($cita->estado)}}">{{Util::estadoStringCita($cita->estado)}}</span></td>
                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$cita->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('pacientes.atender',$cita->id)}}" ><i class="bi bi-play-circle-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Nueva Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('citas.store')}}" method="post" id="formulario" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefaultUsername" class="form-label">Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                        <input type="text" class="form-control" id="email" aria-describedby="inputGroupPrepend2" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault04" class="form-label">Mascota</label>
                                    <select class="form-select" id="listaMascota" name="mascota_id" required>
                                        <option selected disabled value="">Mascota...</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Cita</label>
                                    <input type="text" class="form-control" id="nombre"  name="nombre"  required>
                                </div>
                                <div class="row mb-12">
                                    <label for="inputDate" class="col-sm-12 col-form-label">Fecha de Programación</label>
                                    <div class="col-sm-6">
                                        <input type="datetime-local" class="form-control" name="fecha_programacion" id="fecha_programacion">
                                    </div>
                                </div>
                                <div class="row mb-12">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Descripción</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" style="height: 100px" name="descripcion" id="descripcion"></textarea>
                                    </div>
                                </div>
                                <div id="divEstado" class="col-md-6" style="display: none">
                                    <label for="validationDefault05" class="form-label">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
                                        <option value="A">Activo</option>
                                        <option value="D">Reprogramado</option>
                                        <option value="F">Terminado</option>
                                        <option value="R">Rechazado</option>
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
            let val_url = '/pacientes/citas/edit/'+val_id;
            let val_url_update = '/pacientes/citas/update/'+val_id;
            $.get(val_url, function (res){
                let val_email = res.email;
                let val_url = '/pacientes/citas/listamascotas/'+val_email;
                $.get(val_url,function (response){
                    if(response==='error'){
                        $('#email').css('border-color','red');
                    }else {
                        $('#email').css('border-color','green');
                        $('#listaMascota').html(response);
                        $('#formulario').attr('action',val_url_update);
                        $('#modalTitulo').html('Editar Cita');
                        $('#nombre').val(res.cita);
                        $('#email').val(res.email);
                        $('#fecha_programacion').val(res.fecha_programacion)
                        $('#descripcion').val(res.descripcion);
                        $('#divEstado').css('display','block');
                        $('#estado').val(res.estado);
                        $('.btnGuardar').html('Editar');
                        $('#listaMascota').val(res.mascota_id);
                        $('#modalDatos').modal('show');
                    }
                });
            });
        });

        $('#email').change(function (){
            let val_email = $(this).val();
            let val_url = '/pacientes/citas/listamascotas/'+val_email;
            $.get(val_url,function (res){
                if(res==='error'){
                    $('#email').css('border-color','red');
                }else {
                    $('#email').css('border-color','green');

                    $('#listaMascota').html(res);
                }
            });
        });



        $('.btnCrear').click(function (){
            $('#email').val('');
            $('#nombre').val('');
            $('#descripcion').val('');
            $('#formulario').attr('action','/pacientes/citas/store');
            $('.btnGuardar').html('Guardar');
            $('#fecha_programacion').val('');
            $('#divEstado').css('display','none')
            $('#modalDatos').modal('show');
        });
    </script>
@endsection
