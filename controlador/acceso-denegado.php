<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Acceso Denegado - Simulador Bursatil INT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card mt-5">
                    <div class="card-body text-center p-4">
                        <div class="display-1 text-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h2 class="mt-3">Acceso Denegado</h2>
                        <p class="text-muted">No tienes los permisos necesarios para acceder a esta página.</p>
                        
                        <?php
                        // Iniciamos sesión para verificar el rol
                        session_start();
                        
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                            // El usuario está logueado, mostramos el enlace a su página principal según su rol
                            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                                echo '<a href="analytics-reports.php" class="btn btn-primary">Ir al Panel de Administrador</a>';
                            } else {
                                echo '<a href="analytics-customers.php" class="btn btn-primary">Ir a Mi Portal</a>';
                            }
                        } else {
                            // El usuario no está logueado
                            echo '<a href="auth-login.php" class="btn btn-primary">Iniciar Sesión</a>';
                        }
                        ?>
                        
                        <a href="controlador/logout.php" class="btn btn-outline-danger ml-2">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>