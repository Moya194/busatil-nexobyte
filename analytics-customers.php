<?php
session_start();
include 'constant/conexionDB.php'; // Asegúrate de que la conexión PDO se configure correctamente

// Para efectos del ejemplo, supongamos que los datos del usuario se almacenaron en la sesión:
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
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página del Usuario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <!-- Header -->
  <header class="flex items-center justify-between bg-white shadow p-4">
    <!-- Logo a la izquierda -->
    <div class="flex items-center">
      <img src="assets/images/valores.jpg" alt="Logo" class="h-10 w-auto">
    </div>
    
    <!-- Datos del usuario en el centro -->
    <div class="text-center">
      <h1 class="text-xl font-bold"><?php echo htmlspecialchars($nombreUsuario); ?></h1>
      <p class="text-gray-600"><?php echo htmlspecialchars($emailUsuario); ?></p>
    </div>
    
    <!-- Botón de opciones a la derecha -->
    <div class="relative">
      <button id="menuButton" class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none">
        Opciones
      </button>
      <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
        <a href="actualizar_usuario.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Actualizar Usuario</a>
        <a href="controlador/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cerrar Sesión</a>
      </div>
    </div>
  </header>
  
  <!-- Contenido Principal: Listado de Salas -->
  <main class="p-8">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-2xl font-bold mb-4">Salas Disponibles</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (count($salas) > 0): ?>
          <?php foreach ($salas as $sala): ?>
            <div class="bg-white p-6 rounded shadow">
              <h3 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($sala['SALNOMBRE']); ?></h3>
              <p class="text-gray-700 mb-2"><?php echo htmlspecialchars($sala['SALDESCRIPCION']); ?></p>
              <p class="text-gray-600 mb-2"><strong>Turnos:</strong> <?php echo htmlspecialchars($sala['SALNUMEROTURNOS']); ?></p>
              <p class="text-gray-600 mb-4"><strong>Usuarios:</strong> <?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?></p>
              <!-- Al hacer clic se redirige a la sala de espera con el id de la sala -->
              <a href="sala_espera.php?salaID=<?php echo $sala['SALID']; ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Unirse</a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No hay salas disponibles en este momento.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>
  
  <script>
    // Toggle del menú desplegable
    const menuButton = document.getElementById('menuButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    
    menuButton.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdownMenu.classList.toggle('hidden');
    });
    
    document.addEventListener('click', () => {
      dropdownMenu.classList.add('hidden');
    });
  </script>
</body>
</html>
