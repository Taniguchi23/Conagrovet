<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Quienes Somos</title>
    <link rel="stylesheet" href="/asset/css/style_quienes.css">
    <link rel="icon" href="/asset/img/icono.png">
    <script src="https://kit.fontawesome.com/97bed5bbe0.js" crossorigin="anonymous"></script>

    <!--  Toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
<body>
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
<!-- --::::::MAIN::::::-- -->
<main>
    <div class="titulo-quienes col-4 col-m-6 col-s-12">
        <img src="/asset/img/quienes-somos.webp" alt="">
    </div>
    <div class="container-quienes col-9 col-m-10 col-s-11">
        <div class="contarinerTop">
            <div class="containerTop-imagen">
                <img src="/asset/img/Team.png" alt="">
            </div>
            <div>
                <p>Conagrovet es una empresa veterinaria, con el gran propósito de colaborar con la salud pública de las mascotas y animales agropecuarios </p>
            </div>
        </div>
        <div class="container-imagen">
            <img src="/asset/img/fondo-1.jpg" alt="">
        </div>
        <div class="container-bottom">
            <h3>MISIÓN :</h3><hr width="80" color="white"><br class="espaciado">
            <P>Brindar productos de buena calidad, productos exclusivos y a precios competitivos.
            </P><br>
            <h3>VISIÓN :</h3><hr width="80" color="white"><br class="espaciado">
            <p>Ser una empresa proveedora de alimentos, fármacos y accesorios que comercializa a nivel nacional con nuestras tiendas distribuidas en localidades más importantes de Lima y el Perú.
            </p><br>
        </div>
    </div>
</main>
<!-- --::::::PIE DE PÁGINA::::::-- -->
<footer>
    <div class="grupo-1 col-s-12">
        <div class="box col-m-4">
            <figure>
                <a href="https://www.utp.edu.pe/" target="_blank"><img src="/asset/img/logo-utp.png" alt="Logo de UTP" ><!-- U T P --></a>
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
