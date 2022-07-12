@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Historial de citas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                <li class="breadcrumb-item">Pacientes</li>
                <li class="breadcrumb-item active">Historial de citas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" >
            <input type="text" id="buscar" placeholder="Buscar" title="Ingrese el código de la mascota">
            <button type="button" title="Search"><i class="bi bi-search"></i></button>
        </form>
        <span class="text-danger text-center" style="display:none" id="buscarSpan"></span>
    </div><!-- End Search Bar -->

    <section class="section mt-4">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <h5 class="card-title mt-2 ml-2">Lista de Citas</h5>
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
                            <tbody id="listaHistorial">

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('script')
<script>
    $('#buscar').change(function (){
        let val_buscar = $(this).val();
        console.log(val_buscar);
        $.get('/pacientes/citas/listahistorial/'+val_buscar,function (res){
            console.log(res);
            if(res==='error'){
                $('#buscarSpan').html('No se ha encontrado el registro');
                $('#buscarSpan').css('display','block');
                $('#listaHistorial').html('');
            }else{
                $('#buscarSpan').css('display','none');
                $('#listaHistorial').html(res);
            }
        })
    });
</script>
@endsection
