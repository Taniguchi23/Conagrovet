<!DOCTYPE html>
<html>

<head>
    <title>Servicios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Archivo CSS -->
    <link href="/asset/css/style-servicios_contacto.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/97bed5bbe0.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/asset/img/icono.png">

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




<!-- --::::::CONTENIDO::::::-- -->
<!--OPCIONAL
<div class="titulo col-12 col-m-12 col-s-12">

   <h1>
      <center>SERVICIOS</center>
   </h1>

</div>
-->
<div class="fila">

    <div class="col-6 col-m-12 col-s-12">
         <span style="font-family:raleway,sans-serif;"><span style="font-size:20px;">

               <p>
                  <center>HOZPITALIZACIÓN:</center>
                 </p>
                 <br><br>
               <li> Zonas de hospitalización son ambientes equipados
                  y adaptados para la tranquilidad y comodidad de su mascota.</li>
               <br>
               <li>Nuestros médicos veterinarios y asistentes médicos monitorean
                  las 24 horas del día a los pacientes, asegurándose de su pronta</li>
               <br>
               <li>Recuperación y bienestar durante su tiempo en la clínica</li>

            </span></span>

    </div>


    <div class="col-6 col-m-12 col-s-12">
        <br><br>
        <img src="/asset/img/p2.png" width="100%" height="100%" alt="">
    </div>


</div>



<div class="fila">

    <div class="col-6 col-m-12 col-s-12">
         <span style="font-family:raleway,sans-serif;"><span style="font-size:20px;">
               <br>
               <p>
                  <center>VACUNAS:</center>
                 </p>
                 <br><br>
               Dependiendo de la edad con la que has adoptado a tu cachorro, deberás revisar si ha iniciado el protocolo
               de vacunación en su cartilla.<br>
               En cualquier caso, el veterinario en la primera consulta revisará esta cartilla y te informará sobre las
               vacunas que ya tiene o si todavía<br>
               no ha comenzado con dicho protocolo de vacunación</p>
                 <ul type="">
                  <li>1ª dosis: Vacuna monovalente o bivalente, suelen tener mayor carga antigénica, aplicación entre
                     las 6-8 semanas de edad del cachorro.</li>
                  <li>2ª dosis: Vacuna polivalente canina, entre las 9 -11 semanas de edad.</li>
                  <li>3ª dosis: Repetiremos la dosis anterior de vacuna polivalente entre las 12 y 14 semanas de edad
                     del animal.</li>
                     </ul>
            </span></span>
    </div>
    <div class="col-6 col-m-12 col-s-12">
        <br>
        <br>
        <img src="/asset/img/vacuna.jpg" width="100%" height="100%" alt="">
    </div>
</div>
<div class="fila">
    <div class="col-6 col-m-12 col-s-12">
         <span style="font-family:raleway,sans-serif;"><span style="font-size:20px;">
               <p>
                  <center>PELUQUERÍA</center>
                 </p>
                 <br><br>
               <span style="font-family:raleway,sans-serif;"><span style="font-size:20px;">
                     Nuestro servicio de peluquería canina y felina ofrece una amplia variedad de cortes de pelo y
                     baños, tanto estéticos como terapéuticos.<br>
                     Se realizan corte comercial y con tijera y cada animal es bañado con el champú y acondicionador más
                     adecuado para su tipo de piel y pelo.<br>
                     Además, se cortan las uñas, limpian los oídos y vacían los sacos anales.Igualmente, se procuran
                     tratamientos de champuterapia y corte <br>
                     terapéutico a los animales con problemas dermatológicos que lo requieran.
                     <br><br><br>
                  </span></span>
    </div>
    <div class="col-6 col-m-12 col-s-12">
        <br>
        <br>
        <img src="/asset/img/peluq.jpg" width="100%" height="100%" alt="">
    </div>
</div>
<!-- --::::::PIE DE PÁGINA::::::-- -->
<footer>
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="https://www.utp.edu.pe/" target="_blank"> <img src="/asset/img/logo-utp.png" alt="Logo de UTP"> </a>
            </figure>
            <p>Proyecto del curso "Taller De Programación Web"</p><hr color="#f4f0c0">
        </div>
        <div class="box-enlaces">
            <h4>NOSOTROS</h4>
            <a href="{{route('web.quienes')}}">Quienes Somos </a> <samp>|</samp>
            <a href="{{route('web.nosotros')}}">Nuestra Familia</a>
            <a href="{{route('web.servicios')}}">Nuestros Servicios </a> <samp>|</samp>
            <a href="{{route('web.contactos')}}">Contáctanos</a><hr color="#f4f0c0">
        </div>
        <div class="box-descripcion">
            <h4>CONSORCIO AGRO-VETERINARIO E.I.R.L</h4>
            <p>Empresa líder en el mercado en ventas de alimentos y médicina veterinaria</p>
        </div>
    </div>
    <div class="grupo-2">
        <p>&#169 2022 Todos los derechos reservados</p>
        <p>Desarrollado por Grupo 9</p>
    </div>
</footer>
</body>
</html>
