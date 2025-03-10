<?php
include 'constant/conexionDB.php'; // Database connection

session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth-login.php");
    exit();
}

$user_id = $_SESSION['user_id']; 
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 0;

// Verify room ID is provided
if (!isset($_GET['salaID']) || empty($_GET['salaID'])) {
    echo "Sala no especificada.";
    exit;
}

$salaID = intval($_GET['salaID']);

// Activate room if requested (when form submitted)
if (isset($_POST['activate_room']) && $tipo_usuario == 1) {
    try {
        $query = "UPDATE RANKING SET RANESTADO = 'Activa' WHERE SALID = :salaID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->execute();
        
        // Refresh the page after activation
        header("Location: salaespera.php?salaID=" . $salaID);
        exit();
    } catch (PDOException $e) {
        echo "Error de activación: " . $e->getMessage();
        exit;
    }
}

try {
    // Get room details
    $query = "SELECT SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS 
              FROM SALAS 
              WHERE SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();
    
    $sala = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$sala) {
        echo "Sala no encontrada.";
        exit;
    }
    
    // Get ranking data for this room
    $query = "SELECT RANID, RANIDUSERUNO, RANIDUSERDOS, RANIDUSERTRES, RANIDUSERCUATRO, 
                     RANIDUSERCINCO, RANIDUSERSEIS, RANIDUSERSIETE, RANIDUSEROCHO, 
                     RANIDUSERNUEVE, RANIDUSERDIEZ, RANESTADO 
              FROM RANKING 
              WHERE SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();

    $ranking = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ranking) {
        // Create a new ranking entry if it doesn't exist
        $query = "INSERT INTO RANKING (SALID, RANIDUSERUNO, RANIDUSERDOS, RANIDUSERTRES, 
                                      RANIDUSERCUATRO, RANIDUSERCINCO, RANIDUSERSEIS, 
                                      RANIDUSERSIETE, RANIDUSEROCHO, RANIDUSERNUEVE, 
                                      RANIDUSERDIEZ, RANESTADO) 
                  VALUES (:salaID, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Esperando')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->execute();
        
        // Get the newly created ranking
        $query = "SELECT RANID, RANIDUSERUNO, RANIDUSERDOS, RANIDUSERTRES, RANIDUSERCUATRO, 
                         RANIDUSERCINCO, RANIDUSERSEIS, RANIDUSERSIETE, RANIDUSEROCHO, 
                         RANIDUSERNUEVE, RANIDUSERDIEZ, RANESTADO 
                  FROM RANKING 
                  WHERE SALID = :salaID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->execute();
        $ranking = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Store user IDs in variables
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
    $ranID = $ranking['RANID'];
    
    // Check if user is already in the ranking
    $userAlreadyInRanking = ($ranIDUserUno == $user_id || 
                             $ranIDUserDos == $user_id || 
                             $ranIDUserTres == $user_id || 
                             $ranIDUserCuatro == $user_id || 
                             $ranIDUserCinco == $user_id || 
                             $ranIDUserSeis == $user_id || 
                             $ranIDUserSiete == $user_id || 
                             $ranIDUserOcho == $user_id || 
                             $ranIDUserNueve == $user_id || 
                             $ranIDUserDiez == $user_id);
    
    // Only add the user if they're not already in the ranking
    if (!$userAlreadyInRanking) {
        // Find first available slot
        if ($ranIDUserUno == 0) {
            $ranIDUserUno = $user_id;
        } elseif ($ranIDUserDos == 0) {
            $ranIDUserDos = $user_id;
        } elseif ($ranIDUserTres == 0) {
            $ranIDUserTres = $user_id;
        } elseif ($ranIDUserCuatro == 0) {
            $ranIDUserCuatro = $user_id;
        } elseif ($ranIDUserCinco == 0) {
            $ranIDUserCinco = $user_id;
        } elseif ($ranIDUserSeis == 0) {
            $ranIDUserSeis = $user_id;
        } elseif ($ranIDUserSiete == 0) {
            $ranIDUserSiete = $user_id;
        } elseif ($ranIDUserOcho == 0) {
            $ranIDUserOcho = $user_id;
        } elseif ($ranIDUserNueve == 0) {
            $ranIDUserNueve = $user_id;
        } elseif ($ranIDUserDiez == 0) {
            $ranIDUserDiez = $user_id;
        }
        
        // Update the ranking table
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
                      RANIDUSERDIEZ = :ranIDUserDiez
                  WHERE SALID = :salaID";
                  
        $stmt = $conn->prepare($query);
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
        $stmt->bindParam(':salaID', $salaID);
        $stmt->execute();
        
        // Associate user with ranking in the USER table
        $query = "UPDATE USER SET RANID = :ranID WHERE USEID = :userID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ranID', $ranID);
        $stmt->bindParam(':userID', $user_id);
        $stmt->execute();
    }
    
    // Count number of players in the room
    $currentPlayers = 0;
    if ($ranIDUserUno > 0) $currentPlayers++;
    if ($ranIDUserDos > 0) $currentPlayers++;
    if ($ranIDUserTres > 0) $currentPlayers++;
    if ($ranIDUserCuatro > 0) $currentPlayers++;
    if ($ranIDUserCinco > 0) $currentPlayers++;
    if ($ranIDUserSeis > 0) $currentPlayers++;
    if ($ranIDUserSiete > 0) $currentPlayers++;
    if ($ranIDUserOcho > 0) $currentPlayers++;
    if ($ranIDUserNueve > 0) $currentPlayers++;
    if ($ranIDUserDiez > 0) $currentPlayers++;
    
    // Check if room is ready to start (has required number of players)
    $roomIsReady = ($currentPlayers >= $sala['SALNUMEROUSUARIOS'] && $ranEstado != 'Activa');
    
    // If room is ready and current user is host (first player), update status
    if ($roomIsReady && $user_id == $ranIDUserUno && $tipo_usuario == 1) {
        $ranEstado = 'Activa';
        $query = "UPDATE RANKING SET RANESTADO = :ranEstado WHERE SALID = :salaID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ranEstado', $ranEstado);
        $stmt->bindParam(':salaID', $salaID);
        $stmt->execute();
    }
    
    // Fetch user names to display them in the waiting room
    $userNames = [];
    
    // First, collect all valid user IDs (non-zero values)
    $userIds = [];
    if ($ranIDUserUno > 0) $userIds[] = $ranIDUserUno;
    if ($ranIDUserDos > 0) $userIds[] = $ranIDUserDos;
    if ($ranIDUserTres > 0) $userIds[] = $ranIDUserTres;
    if ($ranIDUserCuatro > 0) $userIds[] = $ranIDUserCuatro;
    if ($ranIDUserCinco > 0) $userIds[] = $ranIDUserCinco;
    if ($ranIDUserSeis > 0) $userIds[] = $ranIDUserSeis;
    if ($ranIDUserSiete > 0) $userIds[] = $ranIDUserSiete;
    if ($ranIDUserOcho > 0) $userIds[] = $ranIDUserOcho;
    if ($ranIDUserNueve > 0) $userIds[] = $ranIDUserNueve;
    if ($ranIDUserDiez > 0) $userIds[] = $ranIDUserDiez;
    
    // If there are valid user IDs, fetch their names
    if (!empty($userIds)) {
        // Create a string of question marks for the SQL IN clause
        $placeholders = str_repeat('?,', count($userIds) - 1) . '?';
        
        // Query to get user names
        $query = "SELECT USEID, USENOMBRE FROM USER WHERE USEID IN ($placeholders)";
        $stmt = $conn->prepare($query);
        
        // Execute with all user IDs as parameters
        $stmt->execute($userIds);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Create lookup array of user ID => user name
        foreach ($users as $user) {
            $userNames[$user['USEID']] = $user['USENOMBRE'];
        }
    }
    
} catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
    exit;
}

// Set initial money for the trading interface if not set
if (!isset($_SESSION['dinero_usuario'])) {
    $_SESSION['dinero_usuario'] = 200;
}

// Store the room ID in session for the trading interface
$_SESSION['salaID'] = $salaID;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de Espera</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .modal {
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    .modal.active {
      opacity: 1;
      visibility: visible;
    }
    @keyframes pulse {
      0%, 100% {
        opacity: 1;
      }
      50% {
        opacity: 0.6;
      }
    }
    .pulse-animation {
      animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
      <!-- Header -->
      <div class="bg-blue-600 text-white p-6">
        <h1 class="text-3xl font-bold">Sala de Espera</h1>
        <p class="text-lg">Simulador de Bolsa de Valores</p>
      </div>
      
      <!-- Room Details -->
      <div class="p-6 border-b">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <h2 class="text-xl font-semibold mb-4">Detalles de la Sala</h2>
            <p class="mb-2"><span class="font-medium">ID de la Sala:</span> <?php echo htmlspecialchars($salaID); ?></p>
            <p class="mb-2"><span class="font-medium">Nombre:</span> <?php echo htmlspecialchars($sala['SALNOMBRE']); ?></p>
            <p class="mb-2"><span class="font-medium">Descripción:</span> <?php echo htmlspecialchars($sala['SALDESCRIPCION']); ?></p>
            <p class="mb-2"><span class="font-medium">Número de Turnos:</span> <?php echo htmlspecialchars($sala['SALNUMEROTURNOS']); ?></p>
            <p class="mb-2"><span class="font-medium">Número de Usuarios Requeridos:</span> <?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?></p>
            <p class="mb-2"><span class="font-medium">Estado:</span> <span class="<?php echo $ranEstado == 'Activa' ? 'text-green-600' : 'text-yellow-600'; ?> font-semibold"><?php echo htmlspecialchars($ranEstado); ?></span></p>
          </div>
          
          <div>
            <h2 class="text-xl font-semibold mb-4">Usuarios en la Sala (<?php echo $currentPlayers; ?>/<?php echo htmlspecialchars($sala['SALNUMEROUSUARIOS']); ?>)</h2>
            <ul class="bg-gray-50 rounded-lg p-4">
              <?php if ($ranIDUserUno > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">1</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserUno]) ? htmlspecialchars($userNames[$ranIDUserUno]) : 'Usuario '.$ranIDUserUno; ?></span>
                  <?php if ($ranIDUserUno == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                  <?php if ($user_id == $ranIDUserUno && $tipo_usuario == 1): ?><span class="ml-2 px-2 py-1 bg-yellow-500 text-white text-xs rounded">HOST</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserDos > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">2</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserDos]) ? htmlspecialchars($userNames[$ranIDUserDos]) : 'Usuario '.$ranIDUserDos; ?></span>
                  <?php if ($ranIDUserDos == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserTres > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">3</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserTres]) ? htmlspecialchars($userNames[$ranIDUserTres]) : 'Usuario '.$ranIDUserTres; ?></span>
                  <?php if ($ranIDUserTres == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserCuatro > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">4</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserCuatro]) ? htmlspecialchars($userNames[$ranIDUserCuatro]) : 'Usuario '.$ranIDUserCuatro; ?></span>
                  <?php if ($ranIDUserCuatro == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserCinco > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">5</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserCinco]) ? htmlspecialchars($userNames[$ranIDUserCinco]) : 'Usuario '.$ranIDUserCinco; ?></span>
                  <?php if ($ranIDUserCinco == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserSeis > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">6</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserSeis]) ? htmlspecialchars($userNames[$ranIDUserSeis]) : 'Usuario '.$ranIDUserSeis; ?></span>
                  <?php if ($ranIDUserSeis == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserSiete > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">7</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserSiete]) ? htmlspecialchars($userNames[$ranIDUserSiete]) : 'Usuario '.$ranIDUserSiete; ?></span>
                  <?php if ($ranIDUserSiete == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserOcho > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">8</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserOcho]) ? htmlspecialchars($userNames[$ranIDUserOcho]) : 'Usuario '.$ranIDUserOcho; ?></span>
                  <?php if ($ranIDUserOcho == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserNueve > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">9</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserNueve]) ? htmlspecialchars($userNames[$ranIDUserNueve]) : 'Usuario '.$ranIDUserNueve; ?></span>
                  <?php if ($ranIDUserNueve == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
              
              <?php if ($ranIDUserDiez > 0): ?>
                <li class="p-2 border-b flex items-center">
                  <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3">10</div>
                  <span class="font-medium"><?php echo isset($userNames[$ranIDUserDiez]) ? htmlspecialchars($userNames[$ranIDUserDiez]) : 'Usuario '.$ranIDUserDiez; ?></span>
                  <?php if ($ranIDUserDiez == $user_id): ?><span class="ml-2 text-green-600">(Tú)</span><?php endif; ?>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Status and action area -->
      <div class="p-6 bg-gray-50">
        <div class="flex flex-col items-center">
          <?php if ($ranEstado == 'Activa'): ?>
            <div class="text-center mb-4">
              <p class="text-xl font-semibold text-green-600">¡La simulación está activa!</p>
              <p class="text-gray-600">Serás redirigido al simulador de bolsa automáticamente.</p>
            </div>
            <a href="salacompraventa.php?salaID=<?php echo $salaID; ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
              Ingresar al Simulador
            </a>
          <?php elseif ($user_id == $ranIDUserUno && $tipo_usuario == 1 && $currentPlayers >= $sala['SALNUMEROUSUARIOS']): ?>
            <div class="text-center mb-4">
              <p class="text-xl font-semibold text-yellow-600">La sala está llena</p>
              <p class="text-gray-600">Como anfitrión, puedes activar la simulación.</p>
            </div>
            <form method="post" action="">
              <input type="hidden" name="activate_room" value="1">
              <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
                Activar Simulación
              </button>
            </form>
          <?php else: ?>
            <div class="text-center">
              <p class="text-xl font-semibold text-yellow-600">Esperando a más jugadores</p>
              <p class="text-gray-600">Actualmente hay <?php echo $currentPlayers; ?> de <?php echo $sala['SALNUMEROUSUARIOS']; ?> jugadores requeridos.</p>
              <p class="mt-2 text-sm text-gray-500">La página se actualizará automáticamente.</p>
            </div>
            <a href="salacompraventa.php?salaID=<?php echo $salaID; ?>" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
              Ir Directamente al Simulador
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Countdown Modal -->
  <div id="countdownModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full text-center transform transition-all">
      <h2 class="text-2xl font-bold text-blue-600 mb-4">¡La simulación está por comenzar!</h2>
      <p class="text-gray-700 mb-6">Serás redirigido en...</p>
      <div class="flex justify-center">
        <div id="countdown" class="text-6xl font-bold text-blue-600 mb-6">5</div>
      </div>
      <div class="pulse-animation mb-4">
        <p class="text-gray-700">Preparando la simulación...</p>
      </div>
      <a href="salacompraventa.php?salaID=<?php echo $salaID; ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">
        Ingresar Ahora
      </a>
    </div>
  </div>
  
  <script>
    // Function to show modal
    function showModal() {
      document.getElementById('countdownModal').classList.add('active');
    }
    
    // Function to handle countdown
    function startCountdown() {
      let count = 5;
      const countdownElement = document.getElementById('countdown');
      
      const countdownInterval = setInterval(function() {
        count--;
        countdownElement.textContent = count;
        
        if (count <= 0) {
          clearInterval(countdownInterval);
          window.location.href = "salacompraventa.php?salaID=<?php echo $salaID; ?>";
        }
      }, 1000);
    }
    
    // Auto-refresh and modal logic
    <?php if ($ranEstado == 'Activa'): ?>
      // Show countdown modal and start countdown
      document.addEventListener('DOMContentLoaded', function() {
        showModal();
        startCountdown();
      });
    <?php else: ?>
      // Auto-refresh the page every 5 seconds if simulation is not active
      setInterval(function() {
        location.reload();
      }, 5000);
    <?php endif; ?>
  </script>
</body>
</html>