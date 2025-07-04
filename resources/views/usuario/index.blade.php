@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>{{Util::obtenerTipoUsuario($tipo)}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">{{Util::obtenerTipoUsuario($tipo)}}</li>
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
                                    <h5 class="card-title mt-2 ml-2">Lista de {{Util::obtenerTipoUsuario($tipo)}}</h5>
                                </div>
                                @if($tipo != 'I')
                                <div class="mt-4 col-2">
                                    <button class="btn btn-success btnCrear" data-id="{{$tipo}}" data-bs-toggle="modal" data-bs-target="#modalDatos">Crear Usuario</button>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable" id="tabla">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                @if($tipo === 'I')
                                <th scope="col">Rol</th>
                                @endif
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $ids => $usuario)
                            <tr>
                                <th scope="row">{{$ids+1}}</th>
                                <td>{{$usuario->name}}</td>
                                @if($tipo === 'I')
                                <td>{{Util::obtenerTipoUsuarioSingular($usuario->tipo)}}</td>
                                @endif
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->telefono}}</td>
                                <td>
                                    <button type="button" data-bs-target="#modalDatos" data-bs-toggle="modal" class="btn btn-m text-primary btnEditar" data-id="{{$usuario->id}}"><i class="bi bi-pencil-square"></i></button>
                                    <a class="text-danger" href="{{route('usuarios.delete',$usuario->id)}}" onclick="return confirm ('¿Está seguro de eliminar este registro')"><i class="bi bi-trash-fill"></i></a>
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
                    <h5 class="modal-title" id="modalTitulo">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('usuarios.store')}}" method="post" id="formulario">
                    @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="name"  name="name" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationDefaultUsername" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault05" class="form-label">Dni</label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                                <span  class="form-label labelDni" style="display: none"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault04" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="A">Administrador</option>
                                    <option value="D">Doctor</option>
                                    <option value="C">Cliente</option>
                                    <option value="E">Empleado</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault05" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault05" class="form-label">Contraseña</label>
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationDefault05" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault04" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="H">Hombre</option>
                                    <option value="M">Mujer</option>
                                </select>
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
         let val_url = '/usuarios/edit/'+val_id;
         let val_url_update = '/usuarios/update/'+val_id;
         $.get(val_url, function (res){
             $('#formulario').attr('action',val_url_update);
             $('#modalTitulo').html('Editar Usuario');
             $('#name').val(res.name);
             $('#lastname').val(res.lastname);
             $('#email').val(res.email);
             $('#dni').val(res.dni);
             $('#role').val(res.tipo);
             $('#divEstado').css('display','block');
             $('#estado').val(res.estado);
             $('#password').attr('required',false);
             $('#telefono').val(res.telefono);
             $('#sexo').val(res.sexo);
             $('#direccion').val(res.direccion);
             $('.btnGuardar').html('Editar');
             $('#modalDatos').modal('show');
         });
     });

    function validarDni(){
        let val_dni = $('#dni').val();
        if (val_dni.length() === 8){
            let val_url = '/api/dni/'+val_dni;
            $.get(val_url,function (res){
                if(res==='ok'){
                    return true;
                }else {
                    $('.labelDni').css('display','block').val('Este dni no está disponible');
                    return false;
                }
            });
        }else {
            $('.labelDni').css('display','block').val('El dni debe tener 8 números');
            return false;
        }

    }

        $('.btnCrear').click(function (){
            let val_tipo = $(this).data('id');
            let val_url_store = '/usuarios/store';
            $('#formulario').attr('action',val_url_store);
            $('#modalTitulo').html('Crear Usuario');
            $('#name').val('');
            $('#lastname').val('');
            $('#email').val('');
            $('#dni').val('');
            $('#role option:first').prop('selected',true);
            $('#divEstado').css('display','none');
            $('#sexo option:first').prop('selected',true);
            $('#password').attr('required',true);
            $('#telefono').val('');
            $('#direccion').val('');
            $('.btnGuardar').html('Guardar');
            $('#modalDatos').modal('show');
        });
</script>
@endsection
