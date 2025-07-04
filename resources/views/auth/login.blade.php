<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Conagrovet / Login </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="/asset/img/icono.png">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f50832512.js" crossorigin="anonymous"></script>
</head>

<body>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <img src="/asset/img/icono.png" alt="">
                                <span class="d-none d-lg-block text-success">Conagrovet</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4 text-success">Bienvenido a Conagrovet</h5>
                                    <p class="text-center small text-success">Ingresa tu email y contraseña</p>
                                </div>

                                <form class="row g-3 needs-validation" action="{{route('login')}}" method="POST" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="yourUsername" required>
                                            <div class="invalid-feedback">Por favor ingresa tu email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Por favor ingresa tu contraseña</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Recordarme</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-success w-100" type="submit">Ingresar</button>
                                    </div>
                                    <!--div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                    </div-->
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            Designed by <a href="https://conagrovet.com">Conagrovet</a>
                            <div class="text-center m-4">
                                <a class="m-2" href="https://es-la.facebook.com/Conagrovet/" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                                <a class="m-2" href="https://www.instagram.com/conagrovet/?hl=es" target="_blank"><i class="fa-brands fa-instagram text-danger fa-2x"></i></a>
                                <a class="m-2" href="https://conagrovet.com" target="_blank"><i class="fa-solid fa-house text-success fa-2x"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/chart.js/chart.min.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>
<script src="/assets/vendor/quill/quill.min.js"></script>
<script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

</body>

</html>
