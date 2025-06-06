<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.getappui.com/collab/unikit/default/auth-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:17:41 GMT -->
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
   <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.php" class="logo logo-admin">
                                            <img src="assets/images/valores.jpg" height="50" alt="logo" class="auth-logo">
                                            <i class="fas fa-arrow-right mx-3 text-white"></i> <!-- Flecha -->
                                            <img src="assets/images/logo-principal.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white  font-18 fs-3">Bienvenidos al simulador bursatil del INT</h4>   
                                        <p class="text-muted  mb-0">Comienza ahora!</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                <form class="my-4" action="controlador/createUser.php" method="POST"> <!-- Aquí debes apuntar al backend que recibirá el POST -->
                                    <!-- Cédula -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="cedula">Cédula</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingresa tu Cédula" required>                               
                                    </div><!--end form-group--> 

                                    <!-- Nombre -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>                               
                                    </div><!--end form-group--> 

                                    <!-- Apellido -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>                               
                                    </div><!--end form-group--> 

                                    <!-- Email -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>                               
                                    </div><!--end form-group--> 

                                    <!-- Contraseña -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="userpassword">Contraseña</label>                                            
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Ingresa tu Contraseña" required>                            
                                    </div><!--end form-group--> 

                                    <!-- Confirmar Contraseña -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="Confirmpassword">Confirma tu contraseña</label>                                            
                                        <input type="password" class="form-control" name="confirmpassword" id="Confirmpassword" placeholder="Confirma tu contraseña" required>                            
                                    </div><!--end form-group--> 

                                    <!-- Rol (puede ser un select si tienes roles) -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="rol">Rol</label>
                                        <select class="form-control" id="rol" name="rol" required>
                                            <option value="usuario">Usuario</option>
                                            <option value="admin">Administrador</option>
                                        </select> 
                                    </div><!--end form-group--> 
                                                                       <!-- Rol (puede ser un select si tienes roles) -->
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="saldo">Saldo</label>
                                        <select class="form-control" id="saldo" name="saldo" required>
                                            <option value="100">100</option>
                                            <option value="300">300</option>
                                            <option value="500">500</option>
                                            <option value="700">700</option>
                                        </select> 
                                    </div><!--end form-group--> 

                                    <!-- Términos y condiciones -->
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" id="customSwitchSuccess" required>
                                                <label class="form-check-label" for="customSwitchSuccess">Estás de acuerdo con los <a href="#" class="text-primary">Términos y condiciones</a></label>
                                            </div>
                                        </div><!--end col--> 
                                    </div><!--end form-group--> 

                                    <!-- Botón de Registro -->
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <button class="btn btn-custom" type="submit">Registrar <i class="fas fa-sign-in-alt ms-1"></i></button>
                                            </div>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->

                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Ya tienes cuenta? <a href="auth-login.php" class="text-primary ms-2">Ingresa</a></p>
                                    </div>
                                </div><!--end card-body-->
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

<!-- Mirrored from themes.getappui.com/collab/unikit/default/auth-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Mar 2025 06:17:41 GMT -->
</html>

