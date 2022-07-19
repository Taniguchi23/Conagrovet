<div class="col-xl-8">

    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->

            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-8 mt-2"><h5 class="text-success">Detalles del {{$mascota->raza->animal->nombre}}</h5></div>
                        <div class="col-lg-3 col-md-3 col-sm-4 d-flex">
                            <a href="{{route('mascotas.pdf', $mascota->id)}}" class="btn btn-success">Exportar <i class="bi bi-file-earmark-pdf-fill"></i> </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Código</div>
                        <div class="col-lg-9 col-md-8">{{$mascota->id}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Tipo</div>
                        <div class="col-lg-9 col-md-8">{{$mascota->raza->animal->nombre}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Raza</div>
                        <div class="col-lg-9 col-md-8">{{$mascota->raza->nombre}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Sexo</div>
                        <div class="col-lg-9 col-md-8">{{Util::stringSexo($mascota->sexo)}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Nombre</div>
                        <div class="col-lg-9 col-md-8">{{$mascota->nombre}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Fecha de nacimiento</div>
                        <div class="col-lg-9 col-md-8">{{Util::formatoFecha($mascota->fecha_nacimiento)}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Peso</div>
                        <div class="col-lg-9 col-md-8">{{$mascota->peso}} Kg.</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Esterelizado</div>
                        <div class="col-lg-9 col-md-8">{{Util::stringEsteril($mascota->esterilizado)}}</div>
                    </div>


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lista del Historial</h5>

                            <!-- List group with Links and buttons -->
                            <div class="list-group">
                                @foreach($citas as $cita)
                                    <a href="" class="list-group-item list-group-item-action active" aria-current="true">
                                        {{$cita->nombre}} - {{Util::formatoFecha($cita->fecha_programacion)}}
                                    </a>
                                @endforeach
                            </div><!-- End List group with Links and buttons -->

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-settings">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vacunas de {{$mascota->nombre}}</h5>
                            <p>Si<code> va a viajar y necesita un comprobante de las vacunas</code> solicitelo con nosotros. </p>

                            <!-- List group with active and disabled items -->
                            <ul class="list-group list-group-flush">
                                @foreach($listaVacunas as $ids => $vacunas)
                                    <li class="list-group-item">{{$vacunas['nombre']}} - <span class="text-success fw-bold">Código: {{$vacunas['codigo']}}</span> </li>
                                @endforeach
                            </ul><!-- End Clean list group -->

                        </div>
                    </div>
                </div>
            </div><!-- End Bordered Tabs -->

        </div>
    </div>

</div>
