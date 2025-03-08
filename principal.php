<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4 flex flex-col justify-between">
            <div>
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
        </main>
    </div>

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
