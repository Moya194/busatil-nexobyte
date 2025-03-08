<?php
include 'constant/conexionDB.php'; // Asegúrate de que la ruta sea correcta

// Verificamos que se haya enviado el parámetro salaID
if (!isset($_GET['salaID']) || empty($_GET['salaID'])) {
    echo "Sala no especificada.";
    exit;
}

$salaID = intval($_GET['salaID']);

try {
    // Consultamos los detalles de la sala
    $query = "SELECT SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS 
              FROM SALAS 
              WHERE SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();
    
    // Opcional: para depuración, descomenta la siguiente línea
    // var_dump($stmt->rowCount(), $stmt->fetchAll(PDO::FETCH_ASSOC));
    
    // Volvemos a ejecutar la consulta para obtener la fila (si usas fetchAll() ya no podrás usar fetch() luego)
    $stmt->execute();
    $sala = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$sala) {
        echo "Sala no encontrada.";
        exit;
    }
} catch (PDOException $e) {
    echo "Error al obtener los datos de la sala: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de Espera</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-bold mb-4 text-center">Sala de Espera</h1>
      <p class="mb-2"><strong>ID de la Sala:</strong> <?php echo htmlspecialchars($salaID); ?></p>
      <p class="mb-2"><strong>Nombre:</strong> <?php echo htmlspecialchars($sala['SALNOMBRE']); ?></p>
      <p class="mb-2"><strong>Descripción:</strong> <?php echo htmlspecialchars($sala['SALDESCRIPCION']); ?></p>
      <p class="mb-2"><strong>Número de Turnos:</strong> <?php echo htmlspecialchars($sala['SALNUMEROTURNOS']); ?></p>
      <p class="mb-2"><strong>Número de Usuarios:</strong> <?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?></p>
      <div class="mt-6 text-center">
          <p class="text-green-600 font-bold">¡Esperando el inicio de la sesión!</p>
      </div>
    </div>
  </div>
</body>
</html>
