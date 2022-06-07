<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/css/style_index.css">
    <link rel="icon" href="/asset/img/icono.png">

    <!--  Toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97bed5bbe0.js" crossorigin="anonymous"></script>
    <title>CONAGROVET</title>
</head>
<body class="body-principal" >
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
    <div class="mensaje-principal ">
        <div class="titulo col-s-11">
            <p>Bienvenidos a CONAGROVET </p>
        </div>
    </div>
    <div class="card-principal col-s-11">
        <div class="texto-principal ">
            <p> <samp>Sé parte de esta gran familia de CONAGROVET</samp> <br><br> Siguiendo el historial clínico de tu engreído, teniendo el control de sus vacunas y de sus citas.</p>
        </div>

        <div class="boton-principal">
            <a href="{{route('web.contactos')}}">
                Únete a nuestra Familia
            </a>
        </div>
    </div>

</main>
</body>
</html>
