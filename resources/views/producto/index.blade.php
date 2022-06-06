@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Registros</li>
                <li class="breadcrumb-item active">Productos</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de Productos</h5>
                                </div>

                                    <div class="mt-4 col-2">
                                        <button class="btn btn-success btnCrear"  data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Producto</button>
                                    </div>

                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Código</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Registrado</th>
                                <th scope="col">Actualizado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $ids => $producto)
                                <tr>
                                    <th scope="row">{{$ids+1}}</th>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->marca->nombre}}</td>
                                    <td>{{$producto->codigo_factura}}</td>
                                    <td>{{$producto->cantidad}}</td>
                                    <td><span class="rounded-3 p-1 bg-{{Util::colorEstadoProducto($producto->estado)}} text-white">{{Util::estadoProducto($producto->estado)}}</span></td>
                                    <td>{{Util::formatoFecha($producto->created_at)}}</td>
                                    <td>{{Util::formatoFecha($producto->updated_at)}}</td>
                                    <td>
                                        <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$producto->id}}"><i class="bi bi-pencil-square"></i></button>
                                        <a class="text-danger" href="{{route('usuarios.delete',$producto->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Producto Nuevo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('productos.store')}}" method="post" id="formulario">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Producto</label>
                                    <input type="text" class="form-control" id="nombre"  name="nombre" value="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault02" class="form-label">Código de factura</label>
                                    <input type="text" class="form-control" id="codigoFactura" name="codigoFactura" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault04" class="form-label">Marca</label>
                                    <select class="form-select" id="marca" name="marca" required>
                                        @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault05" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" step="0.1" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault04" class="form-label">Unidad</label>
                                    <select class="form-select" id="unidad" name="unidad" required>
                                        <option value="und">unidad</option>
                                        <option value="ml">mg</option>
                                    </select>
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
    <script type="text/javascript">

        $('#tabla').on('click','.btnEditar',function (){
            let val_id = $(this).data('id');
            let val_url = '/productos/edit/'+val_id;
            let val_url_update = '/productos/update/'+val_id;
            $.get(val_url, function (res){
                $('#formulario').attr('action',val_url_update);
                $('#modalTitulo').html('Editar Producto');
                $('#nombre').val(res.producto.nombre);
                $('#codigoFactura').val(res.producto.codigo_factura);
                $('#cantidad').val(res.producto.cantidad);
                $('#divEstado').css('display','block');
                $('#estado').empty();
                $('#estado').append($('<option>',{value: 'E', text: 'Existe'}),$('<option>',{value: 'N', text: 'No existe'}),
                $('<option>',{value: 'U', text: 'Usado'}));
                $('#estado  option[value = '+res.producto.estado+']').attr('selected',true);
                $('#password').attr('required',false);
                $('#telefono').val(res.telefono);
                $('#direccion').val(res.direccion);
                $('#modalDatos').modal('show');
            });
        });

        $('.btnCrear').click(function (){
            let val_url_store = '/productos/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Producto Nuevo');
            $('#nombre').val('');
            $('#codigoFactura').val('');
            $('#cantidad').val('');
            $('#divEstado').css('display','none');
            $('#estado').empty();
            $('#estado').css('display','none')
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
    </script>
@endsection
