<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Familia</title>
    <link rel="stylesheet" href="/asset/css/style_quienes.css">
    <link rel="icon" href="/asset/img/icono.png">
    <script src="https://kit.fontawesome.com/97bed5bbe0.js" crossorigin="anonymous"></script>


    <!--  Toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>
<header>
    <!-- --::::::ENCABEZADO::::::-- -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="/" class="enlace"><img src="/asset/img/icono.png" alt="" class="logo">
            <h1 class="text-logo">CONAGROVET</h1></a>
        <ul>
            <li><a href="{{route('web.quienes')}}">Quienes Somos</a></li>
            <li><a href="{{route('web.nosotros')}}">Nuestra Familia</a></li>
            <li><a href="{{route('web.servicios')}}">Nuestros Servicios</a></li>
            <li><a href="{{route('web.contactos')}}">Contáctanos</a></li>
            @if(Auth::check())
                <li><a href="{{route('login')}}" style="color: #0c4128">{{Auth::user()->name}}</a></li>
            @else
                <li><a href="{{route('login')}}"><i class="fa-solid fa-arrow-right-to-bracket"></i>Iniciar Sesión</a></li>
            @endif
        </ul>
    </nav>
</header>
<main>
    <div class="titulo">
        <h5>Nuestra Familia</h5>
    </div>
    <div class="container-familia">
        <div class="conte col-m-5 col-s-11 col-3" >
            <div class="card stormtroper">
                <img src="/asset/img/daniel.png" alt="">
                <div class="informacion1">
                    <h1>Daniel Piñin</h1>
                    <p class="Carrera"> Ingeniería de Sistemas</p>
                </div>
                <div class="informacion2">

                <span class="precio2"><b>CODIGO: U18100832
                        <br>SEDE:LIMA NORTE
                        <br>EMAIL:danielandersonpr@gmail.com

                        <br>WSP:991739528
                    </b>
                </span>
                </div>

            </div>

        </div>
        <div class="conte col-m-5 col-s-11 col-3">
            <div class="card stormtroper">
                <img src="/asset/img/david.png" alt="">
                <div class="informacion1">
                    <h1>David Ninamancco</h1>
                    <p class="Carrera"> Ingeniería de Sistemas</p>
                </div>
                <div class="informacion2">

                <span class="precio2"><b>CODIGO: U20216282
                        <br>SEDE:LIMA SUR
                        <br>EMAIL:davidninamancco@gmail.com

                        <br>WSP:972095270
                    </b>
                </span>
                </div>

            </div>

        </div>
        <div class="conte col-m-5 col-s-11 col-3">
            <div class="card stormtroper">
                <img src="/asset/img/sony.png" alt="">
                <div class="informacion1">
                    <h1>Sonny Taniguchi</h1>
                    <p class="Carrera"> Ingeniería de Sistemas</p>
                </div>
                <div class="informacion2">

                <span class="precio2"><b>CODIGO: U22210823
                        <br>SEDE:ATE
                        <br>EMAIL:u22210823@utp.edu.pe

                        <br>WSP:941488793
                    </b>
                </span>
                </div>

            </div>

        </div>
        <div class="conte col-m-5 col-s-11 col-3" >
            <div class="card stormtroper">
                <img src="/asset/img/ricardo.png" alt="">
                <div class="informacion1">
                    <h1>Ricardo Castro</h1>
                    <p class="Carrera"> Ingeniería de Software</p>
                </div>
                <div class="informacion2">

                <span class="precio2"><b>CODIGO: U20228543
                        <br>SEDE:LIMA NORTE
                        <br>EMAIL:u20228543@utp.edu.pe

                        <br>WSP:913584297
                    </b>
                </span>
                </div>

            </div>

        </div>
        <div class="conte col-m-5 col-s-11 col-3">
            <div class="card stormtroper">
                <img src="/asset/img/juan.png" alt="">
                <div class="informacion1">
                    <h1>Juan Saavedra</h1>
                    <p class="Carrera"> Ingeniería de Sistemas</p>
                </div>
                <div class="informacion2">

                <span class="precio2"><b>CODIGO: U19305743
                        <br>SEDE:LIMA NORTE
                        <br>EMAIL:u19305743@utp.edu.pe

                        <br>WSP:952355410
                    </b>
                </span>
                </div>

            </div>

        </div>
    </div>

</main>
<!-- --::::::PIE DE PÁGINA::::::-- -->
<footer>
    <div class="grupo-1 col-s-12">
        <div class="box col-m-4">
            <figure>
                <a href="https://www.utp.edu.pe/" target="_blank"><img src="/asset/img/logo-utp.png" alt="Logo de UTP"><!-- U T P --></a>
            </figure>
            <p>Proyecto del curso "Taller De Programación Web"</p><hr color="#f4f0c0">
        </div>
        <div class="box-enlaces col-m-4 col-s-12">
            <h4>NOSOTROS</h4>
            <a href="{{route('web.quienes')}}">Quienes Somos </a> <samp>|</samp>
            <a href="{{route('web.nosotros')}}">Nuestra Familia</a>
            <a href="{{route('web.servicios')}}">Nuestros Servicios </a> <samp>|</samp>
            <a href="{{route('web.contactos')}}">Contáctanos</a><hr color="#f4f0c0">
        </div>
        <div class="box-descripcion col-m-4">
            <h4>CONSORCIO AGRO-VETERINARIO E.I.R.L</h4>
            <p>Empresa líder en el mercado en ventas de alimentos y medicina veterinaria</p>
        </div>
    </div>
    <div class="grupo-2">
        <p>&#169 2022 Todos los derechos reservados</p>
        <p>Desarrollado por Grupo 9</p>
    </div>
</footer>
</body>

</html>
