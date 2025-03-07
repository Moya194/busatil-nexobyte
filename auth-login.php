<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Unikit - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/fondo2.jpg'); background-size: cover; background-position: center center;">
    <?php
    // Iniciamos sesión para poder mostrar errores
    session_start();
    ?>

    <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card rounded-4">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.php" class="logo logo-admin">
                                            <img src="assets/images/valores.jpg" height="50" alt="logo" class="auth-logo">
                                            <i class="fas fa-arrow-right mx-3 text-white"></i> <!-- Flecha -->
                                            <img src="assets/images/logo-principal.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18 fs-3">Bienvenidos al simulador bursatil del INT</h4>
                                        <p class="text-muted mb-0">Comienza ahora!</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <?php
                                    // Mostramos errores de login si existen
                                    if (isset($_SESSION['login_error'])) {
                                        echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                                        unset($_SESSION['login_error']); // Limpiamos el mensaje de error
                                    }
                                    ?>

                                    <form class="my-4" action="controlador/login-process.php" method="POST">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Usuario</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese Usuario" required>
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Ingrese su Contraseña" required>
                                        </div><!--end form-group-->

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" id="customSwitchSuccess" name="remember">
                                                    <label class="form-check-label" for="customSwitchSuccess">Recordar</label>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-sm-6 text-end">
                                                <a href="auth-recover-pw.php" class="text-muted font-13"><i class="dripicons-lock"></i> Olvidaste tu contraseña?</a>
                                            </div><!--end col-->
                                        </div><!--end form-group-->

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                <button class="btn btn-custom" type="submit">Registrar <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>

                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">No tienes una cuenta ? <a href="auth-register.php" class="text-primary ms-2">Registrate gratis</a></p>
                                    </div>
                                    <hr class="hr-dashed mt-4">

                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>