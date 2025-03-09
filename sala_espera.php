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


// En esta seccion consultamos los valores de la tabla ranking

if (!isset($_GET['salaID']) || empty($_GET['salaID'])) {
    echo json_encode(['error' => 'Sala no especificada.']);
    exit;
}
$salaID = intval($_GET['salaID']);

try {
    $query = "SELECT RANIDUSERUNO, RANIDUSERDOS, RANIDUSERTRES, RANIDUSERCUATRO, 
                     RANIDUSERCINCO, RANIDUSERSEIS, RANIDUSERSIETE, RANIDUSEROCHO, 
                     RANIDUSERNUEVE, RANIDUSERDIEZ, RANESTADO 
              FROM RANKING 
              WHERE SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();

    $ranking = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ranking) {
        echo json_encode(['error' => 'No se encontraron datos en el ranking.']);
        exit;
    }

    // Guardar cada dato en una variable individual
    $ranIDUserUno = $ranking['RANIDUSERUNO'];
    $ranIDUserDos = $ranking['RANIDUSERDOS'];
    $ranIDUserTres = $ranking['RANIDUSERTRES'];
    $ranIDUserCuatro = $ranking['RANIDUSERCUATRO'];
    $ranIDUserCinco = $ranking['RANIDUSERCINCO'];
    $ranIDUserSeis = $ranking['RANIDUSERSEIS'];
    $ranIDUserSiete = $ranking['RANIDUSERSIETE'];
    $ranIDUserOcho = $ranking['RANIDUSEROCHO'];
    $ranIDUserNueve = $ranking['RANIDUSERNUEVE'];
    $ranIDUserDiez = $ranking['RANIDUSERDIEZ'];
    $ranEstado = $ranking['RANESTADO'];

    // Si necesitas hacer algo con esas variables, como procesarlas o devolverlas, puedes hacerlo aquí
    // Para el ejemplo, vamos a devolver las variables como JSON
    $response = [
        'RANIDUSERUNO' => $ranIDUserUno,
        'RANIDUSERDOS' => $ranIDUserDos,
        'RANIDUSERTRES' => $ranIDUserTres,
        'RANIDUSERCUATRO' => $ranIDUserCuatro,
        'RANIDUSERCINCO' => $ranIDUserCinco,
        'RANIDUSERSEIS' => $ranIDUserSeis,
        'RANIDUSERSIETE' => $ranIDUserSiete,
        'RANIDUSEROCHO' => $ranIDUserOcho,
        'RANIDUSERNUEVE' => $ranIDUserNueve,
        'RANIDUSERDIEZ' => $ranIDUserDiez,
        'RANESTADO' => $ranEstado
    ];

    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener los datos del ranking: ' . $e->getMessage()]);
}

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth-login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


// Si alguna de las variables tiene un valor mayor a 0, no se le asigna nada.
if ($ranIDUserUno == 0) {
    $ranIDUserUno = $user_id;
} 
if ($ranIDUserDos == 0 && $ranIDUserUno != $user_id) {
    $ranIDUserDos = $user_id;
} 
if ($ranIDUserTres == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id) {
    $ranIDUserTres = $user_id;
} 
if ($ranIDUserCuatro == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id) {
    $ranIDUserCuatro = $user_id;
} 
if ($ranIDUserCinco == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id) {
    $ranIDUserCinco = $user_id;
} 
if ($ranIDUserSeis == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id && $ranIDUserCinco != $user_id) {
    $ranIDUserSeis = $user_id;
} 
if ($ranIDUserSiete == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id && $ranIDUserCinco != $user_id && $ranIDUserSeis != $user_id) {
    $ranIDUserSiete = $user_id;
} 
if ($ranIDUserOcho == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id && $ranIDUserCinco != $user_id && $ranIDUserSeis != $user_id && $ranIDUserSiete != $user_id) {
    $ranIDUserOcho = $user_id;
} 
if ($ranIDUserNueve == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id && $ranIDUserCinco != $user_id && $ranIDUserSeis != $user_id && $ranIDUserSiete != $user_id && $ranIDUserOcho != $user_id) {
    $ranIDUserNueve = $user_id;
} 
if ($ranIDUserDiez == 0 && $ranIDUserUno != $user_id && $ranIDUserDos != $user_id && $ranIDUserTres != $user_id && $ranIDUserCuatro != $user_id && $ranIDUserCinco != $user_id && $ranIDUserSeis != $user_id && $ranIDUserSiete != $user_id && $ranIDUserOcho != $user_id && $ranIDUserNueve != $user_id) {
    $ranIDUserDiez = $user_id;
}

$ranEstado = $ranEstado; // Aquí asumimos que ya tienes este valor definido previamente




// Consulta SQL para actualizar la tabla
$query = "UPDATE RANKING 
          SET RANIDUSERUNO = :ranIDUserUno, 
              RANIDUSERDOS = :ranIDUserDos, 
              RANIDUSERTRES = :ranIDUserTres, 
              RANIDUSERCUATRO = :ranIDUserCuatro, 
              RANIDUSERCINCO = :ranIDUserCinco, 
              RANIDUSERSEIS = :ranIDUserSeis, 
              RANIDUSERSIETE = :ranIDUserSiete, 
              RANIDUSEROCHO = :ranIDUserOcho, 
              RANIDUSERNUEVE = :ranIDUserNueve, 
              RANIDUSERDIEZ = :ranIDUserDiez, 
              RANESTADO = :ranEstado 
          WHERE SALID = :salaID";

// Preparar la consulta
$stmt = $conn->prepare($query);

// Bindear los parámetros con los valores correspondientes
$stmt->bindParam(':ranIDUserUno', $ranIDUserUno);
$stmt->bindParam(':ranIDUserDos', $ranIDUserDos);
$stmt->bindParam(':ranIDUserTres', $ranIDUserTres);
$stmt->bindParam(':ranIDUserCuatro', $ranIDUserCuatro);
$stmt->bindParam(':ranIDUserCinco', $ranIDUserCinco);
$stmt->bindParam(':ranIDUserSeis', $ranIDUserSeis);
$stmt->bindParam(':ranIDUserSiete', $ranIDUserSiete);
$stmt->bindParam(':ranIDUserOcho', $ranIDUserOcho);
$stmt->bindParam(':ranIDUserNueve', $ranIDUserNueve);
$stmt->bindParam(':ranIDUserDiez', $ranIDUserDiez);
$stmt->bindParam(':ranEstado', $ranEstado);
$stmt->bindParam(':salaID', $salaID); // El valor de $salaID debe estar previamente definido

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Los datos se han actualizado correctamente.";
} else {
    echo "Error al actualizar los datos.";
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
      <div id="seccion">
      <h1><?php echo $ranIDUserUno; ?></h1>
      <h1><?php echo $ranIDUserDos; ?></h1>
      <h1><?php echo $ranIDUserTres; ?></h1>
      <h1><?php echo $ranIDUserCuatro; ?></h1>
      <h1><?php echo $ranIDUserCinco; ?></h1>
      <h1><?php echo $ranIDUserSeis; ?></h1>
      <h1><?php echo $ranIDUserSiete; ?></h1>
      <h1><?php echo $ranIDUserOcho; ?></h1>
      <h1><?php echo $ranIDUserNueve; ?></h1>
      <h1><?php echo $ranIDUserDiez; ?></h1>
      </div>

      <div class="mt-6 text-center">
          <p class="text-green-600 font-bold">Active la simulacion para los usuarios que ya esten dentro de la sala</p>
      </div>

      
    </div>
  </div>
</body>
</html>
<script>
        // Establece un intervalo de 2 segundos (2000 milisegundos)
        setInterval(function() {
            location.reload(); // Recarga la página
        }, 4000);
    </script>