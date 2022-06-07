@extends('layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Consultas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Consultas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista de Consultas</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Consulta</th>
                                <th scope="col">Email</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consultas as $ids => $consulta)
                            <tr>
                                <th scope="row">{{$ids+1}}</th>
                                <td>{{$consulta->nombre}}</td>
                                <td>{{$consulta->descripcion}}</td>
                                <td>{{$consulta->email}}</td>
                                <td ><span class="rounded-3  p-1 bg-{{Util::colorConsulta($consulta->estado)}} text-white">{{Util::consultaEstado($consulta->estado)}}</span></td>
                                <td>
                                    <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$consulta->id}}"><i class="bi bi-pencil-square"></i></button>
                                    <a href="{{route('admin.consultas.cambio',$consulta->id)}}"><i class="bi bi-check-circle-fill text-success"></i></a>
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
                <form action="" method="post" id="formulario" >
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label for="validationDefault01" class="form-label">Cliente</label>
                                    <input type="text" class="form-control" id="nombre"  name="nombre" value="" required readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationDefault01" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email"  name="email" value="" required readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefault01" class="form-label">Consulta</label>
                                    <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" id="descripcion" style="height: 100px;" readonly></textarea>
                                </div>
                                <div id="divEstado" class="col-md-6" style="display: none">
                                    <label for="validationDefault05" class="form-label">Estado</label>
                                    <select class="form-select" name="estado" id="estado">
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
    <script>
        $('#tabla').on('click','.btnEditar',function (){
            let val_id = $(this).data('id');
            let val_url = '/admin/consultas/edit/'+val_id;
            let val_url_update = '/admin/consultas/update/'+val_id;
            $.get(val_url, function (res){
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Consulta');
                $('#nombre').val(res.nombre);
                $('#email').val(res.email);
                $('#descripcion').val(res.descripcion);
                $('#divEstado').css('display','block');
                $('#estado').empty();
                $('#estado').append($('<option>',{value: 'P', text: 'Pendiente'}),$('<option>',{value: 'R', text: 'Revisado'}));
                $('#estado  option[value = '+res.estado+']').attr('selected',true);
                $('#modalDatos').modal('show');
            });
        });
    </script>
@endsection
