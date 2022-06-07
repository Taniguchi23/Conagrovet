<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="/asset/css/style-servicios_contacto.css">
    <link rel="icon" href="/asset/img/icono.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!--  Toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97bed5bbe0.js" crossorigin="anonymous"></script>
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
<!--         <div class="logo">
            <a href="index.html"><img src="./img/icono.png" alt="">
            <h1 class="text-logo">CONAGROVET</h1></a>
        </div>
        <div class="enlaces">
            <ul>
               <li><a href="Quienes.html">Quienes Somos</a></li>
                <li><a href="familia.html">Nuestra Familia</a></li>
                <li><a href="servicios.html">Nuestros Servicios</a></li>
                <li><a href="contacto.html">Contáctanos</a></li>
                <li><a href="login.html"><i class="fa-solid fa-arrow-right-to-bracket"></i>Iniciar Sesión</a></li>
            </ul>
        </div> -->

<!-- --::::::MAIN::::::-- -->
<main>
    <video src="/asset/img/p1.mp4" autoplay loop muted>
    </video>
    <div class="body">
        <form class="form"  id="formulario" method="post">
            <div class="form_container">
                <h2 class="form_title">Ahora más cerca de ti</h2>
                <input type="text" class="form_input" placeholder="Nombre" name="name" id="nombre" required >
                <input type="email" class="form_input" placeholder="Email" name="email" id="email" required>
                <textarea class="form_input form_input--message" placeholder=" Mensaje" id="descripcion" name="descripcion" required ></textarea>
                <input type="button" value="Enviar" class="form_cta btnEnviar">
            </div>
            <div id="respuesta"></div>
        </form>
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'ssdsd',
            introMessage: "✋ ¡Hola! Bienvenido a Conagrovet"
        };
    </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="/chat" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a-->

</main>
<!-- --::::::PIE DE PÁGINA::::::-- -->
<footer>
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="https://www.utp.edu.pe/" target="_blank"><img src="/asset/img/logo-utp.png" alt="Logo de UTP"></a>
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
        <p>Desarrollado por grupo 9</p>
    </div>
</footer>

<script src="/assets/js/jquery-3.6.0.min.js"></script>
<!--  Toastr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    function validarEmail(){
        let inputEmail = $('#email').val();
        if (inputEmail === ''){
            return false;
        }
        return true;
    }
    $(document).ready(function (){
        $('.btnEnviar').click(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            if(validarEmail()){
                let nombre = $('#nombre').val();
                let email = $('#email').val();
                let descripcion = $('#descripcion').val();
                $.post({
                    data: {
                        nombre:nombre,
                        email:email,
                        descripcion:descripcion,
                    },
                    url:   '/consultas',
                    type:  'POST',
                   // dataType: 'json',
                    //cache: false,
                    //processData: false,
                    //contentType: false,
                   beforeSend: function(){
                        $("#respuesta").html("Procesando, espere por favor...");
                        $('.btnEnviar').css('opacity', 0.6).prop('disabled', true).val('Enviando...');
                    },
                    success:  function (response) {
                        $("#respuesta").html('');
                        $('.btnEnviar').css('opacity', 1).prop('disabled', false).val('Enviar');
                        if (response === 'ok'){
                            toastr.success('Su mensaje ha sido enviado','Mensaje enviado',{"progressBar": true});
                        }else {
                            toastr.warning('Mensaje no enviado','Error',{"progressBar":true})
                        }
                    }
                });


            }else{
                toastr.warning('El campo email está vacío','Error',{"progressBar":true})
            }
        });
    });
</script>
</body>
</html>
