<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4 flex flex-col justify-between">
            <div>
            <div class="brand">
            <a href="index.php" class="logo">
                <span>
                <img src="assets/images/valores.jpg" alt="logo-large" class="logo-lg logo-light">

                </span>
                <!-- <span>
                    <img src="assets/images/valores.jpg" alt="logo-large" class="logo-lg logo-light">
                    <img src="assets/images/valores.jpg" alt="logo-large" class="logo-lg logo-dark">
                </span> -->
            </a>
        </div>
                <h2 class="text-lg font-bold mb-6">Panel de Administración</h2>
                <ul>
                    <li class="mb-4"><button onclick="showCard('Sala')" class="w-full text-left hover:text-green-400">➕ Crear Sala</button></li>
                    <li class="mb-4"><button onclick="showCard('Usuario')" class="w-full text-left hover:text-green-400">👤 Crear Usuario</button></li>
                    <li class="mb-4"><button onclick="showCard('Noticia')" class="w-full text-left hover:text-green-400">📰 Nueva Noticia</button></li>
                    <li class="mb-4"><button onclick="showCard('Actualizar')" class="w-full text-left hover:text-blue-400">🔄 Actualizar Datos</button></li>
                </ul>
            </div>
            <div>
                <a href="controlador/logout.php" class="block text-center bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">🚪 Cerrar Sesión</a>
            </div>
        </aside>
        
        
        <!-- Contenido principal -->
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-bold mb-6">Administración</h1>
            
            <!-- Tarjeta para Crear Sala -->
            <div id="tarjetaSala" class="hidden bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-xl font-semibold mb-4">Crear Sala</h2>
                
                <form action="admin/guardar_sala.php" method="POST">
                <label class="block mb-2">Nombre de la Sala:</label>
                <input type="text" name="nombre" class="border p-2 w-full mb-3 " required>

                <label class="block mb-2">Descripción:</label>
                <textarea name="descripcion" class="border p-2 w-full mb-3 "required></textarea>

                <label class="block mb-2">Número de Turnos:</label>
                <input type="number" class="border p-2 w-full mb-3 " name="numTurnos" min="1" required>

                <label class="block mb-2">Número de Usuarios:</label>
                <input type="number" class="border p-2 w-full mb-3 " name="numUsuarios" min="1" required>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
                </form>

            </div>

            <!-- Tarjeta para Crear Usuario -->
            <div id="tarjetaUsuario" class="hidden bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-xl font-semibold mb-4">Crear Usuario</h2>
                <form action="controlador/createUser.php" method="POST">
                <label class="block mb-2" for="cedula">Cédula:</label>
                    <input type="text" id="cedula" name="cedula" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2" for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2" for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2" for="userpassword">Contraseña:</label>
                    <input type="password" name="password" id="userpassword" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2" for="Confirmpassword">Confirma contraseña:</label>
                    <input type="password" name="confirmpassword" id="Confirmpassword" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2" for="rol">Rol:</label>
                    <select name="rol" id="rol" class="border p-2 w-full mb-3">
                        <option value="admin">Admin</option>
                        <option value="usuario">Usuario</option>
                    </select>

                    <label class="block mb-2" for ="saldo">Saldo Inicial:</label>
                    <input type="number" name="saldo" id="saldo" class="border p-2 w-full mb-3" required>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                
                </form>
            </div>

            <!-- Tarjeta para Añadir Noticia -->
            <div id="tarjetaNoticia" class="hidden bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-xl font-semibold mb-4">Añadir Noticia</h2>
                <form action="admin/publicar_noticia.php" method="POST">
                <label class="block mb-2">ID de Sala:</label>
                    <input type="number" name="salid" class="border p-2 w-full mb-3" required>

                    <label class="block mb-2">Descripción:</label>
                    <textarea name="descripcion" class="border p-2 w-full mb-3" required></textarea>

                    <label class="block mb-2">Sentimiento:</label>
                    <select name="sentimiento" class="border p-2 w-full mb-3">
                        <option value="1">Positivo</option>
                        <option value="-1">Negativo</option>
                        <option value="0">Neutro</option>
                    </select>

                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Publicar</button>
                
                </form>
            </div>

            <!-- Tarjeta para Actualizar Datos -->
            <div id="tarjetaActualizar" class="hidden bg-white p-6 rounded-lg shadow-lg w-1/2">
                <h2 class="text-xl font-semibold mb-4">Actualizar Datos</h2>
                <form action="controlador/actualizar_usuario.php" method="POST">
                    <input type="hidden" name="userid" value="<!-- Aquí va el ID del usuario -->">
                    
                    <label class="block mb-2">Nuevo Nombre:</label>
                    <input type="text" name="nombre" class="border p-2 w-full mb-3">

                    <label class="block mb-2">Nuevo Email:</label>
                    <input type="email" name="email" class="border p-2 w-full mb-3">

                    <label class="block mb-2">Nueva Contraseña:</label>
                    <input type="password" name="password" class="border p-2 w-full mb-3">

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
                </form>
            </div>

            <section>

            <div class="text-center">
    <h1 class="display-6">Salas Activas</h1>
</div>


            <?php
            include 'constant/conexionDB.php';
            $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario';
            $emailUsuario  = isset($_SESSION['email']) ? $_SESSION['email'] : 'usuario@example.com';

            // Consultamos las salas disponibles
            try {
                $query = "SELECT SALID, SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS FROM SALAS";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error al obtener las salas: " . $e->getMessage();
                exit;
            }
            ?>
            <div class="container">
                <div class="row">
                    <?php if (count($salas) > 0): ?>
                        <?php foreach ($salas as $sala): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card team-card">
                                    <div class="card-body">
                                        <!-- Dropdown Menu -->
                                        <div class="float-end">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle" id="dLabel1" data-bs-toggle="dropdown" href="#" role="button"
                                                aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-24 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel1">
                                                    <a class="dropdown-item" href="#">Open Project</a>
                                                    <a class="dropdown-item" href="#">Edit Card</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sala Information -->
                                        <div class="media align-items-center">
                                            <div class="img-group">
                                                <a class="user-avatar me-1" href="#">
                                                    <img src="assets/images/users/user.png" alt="user" class="rounded-circle thumb-md">
                                                    <span class="avatar-badge online"></span>
                                                </a>
                                            </div>
                                            <div class="media-body ms-2 align-self-center">
                                                <h5  class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($sala['SALNOMBRE']); ?></h5>
                                                <p class="text-muted font-12 mb-0">Team Leader</p>
                                            </div>
                                        </div>

                                            <h3></h3>
                                            <p class="text-gray-700 mb-2"><?php echo htmlspecialchars($sala['SALDESCRIPCION']); ?></p>
                                            <p class="text-gray-600 mb-2"><strong>Turnos:</strong> <?php echo htmlspecialchars($sala['SALNUMEROTURNOS']); ?></p>
                                            <p class="text-gray-600 mb-4"><strong>Usuarios:</strong> <?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?></p>
                                        <hr class="hr-dashed my-3">
                                        <!-- Project Details (Optional, can be adjusted to match the salas context) -->
                                        <a href="sala_espera.php?salaID=<?php echo $sala['SALID']; ?>" >        
                                        <div class="media align-items-center bg-light text-white p-3">
                                              <img src="assets/images/small/project-3.jpg" alt="" class="rounded-circle thumb-sm">
                                                <div class="media-body ms-3 align-self-center">
                                                    <h6 class="m-0 font-15 text-darck">Ingresar a la Sala</h6>
                                                    <div class="d-flex justify-content-between">
                                                        <span>
                                                            <a href="#">
                                                                <i class="mdi mdi-format-list-bulleted text-success"></i>
                                                                <span class="text-muted">50/100</span>
                                                            </a>
                                                        </span>
                                                        <span class="text-muted">55% Complete</span>
                                                    </div>
                                                    <div class="progress mt-0" style="height:3px;">
                                                        <div class="progress-bar bg-pink" role="progressbar" style="width: 55%;"
                                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                        <form action="iniciar_simulacion.php" method="POST">
                                            <label for="activar_simulacion" class="block text-sm font-medium text-gray-700">
                                                Selecciona el estado de la simulación
                                            </label>
                                            <select id="activar_simulacion" name="activar_simulacion" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="activar">Activar</option>
                                                <option value="desactivar">Desactivar</option>
                                            </select>
                                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                                Actualizar
                                            </button>
                                        </form>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-lg-4-->
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay salas disponibles en este momento.</p>
                    <?php endif; ?>
                </div><!--end row-->
            </div><!--end container-->
    </section>
        </main>
    </div>
    <!-- Tarjeta para salas -->
    

    <script>
        function showCard(tipo) {
            document.getElementById('tarjetaSala').classList.add('hidden');
            document.getElementById('tarjetaUsuario').classList.add('hidden');
            document.getElementById('tarjetaNoticia').classList.add('hidden');
            document.getElementById('tarjetaActualizar').classList.add('hidden');

            document.getElementById('tarjeta' + tipo).classList.remove('hidden');
        }
    </script>
</body>
</html>
