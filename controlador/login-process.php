<?php
session_start();

// Para depuración - almacena información en un archivo de log
file_put_contents('login_debug.log', 'Acceso al script: ' . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
file_put_contents('login_debug.log', 'POST: ' . print_r($_POST, true) . "\n", FILE_APPEND);

// Incluimos el archivo de conexión
require_once '../constant/conexionDB.php';

// Verificamos si hay conexión
if (!isset($conn)) {
    file_put_contents('login_debug.log', 'Error: No hay conexión a la base de datos' . "\n", FILE_APPEND);
    $_SESSION['login_error'] = "Error de conexión a la base de datos";
    header("Location: ../auth-login.php");
    exit();
}

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario, usando 'cedula' en lugar de 'username'
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $remember = isset($_POST['remember']) ? true : false;
    
    // Para depuración: mostramos los datos recibidos
    echo "Cédula: " . htmlspecialchars($cedula) . "<br>";
    echo "Contraseña: " . htmlspecialchars($password) . "<br>";
    echo "Recordar: " . ($remember ? 'Sí' : 'No') . "<br>";

    file_put_contents('login_debug.log', 'Cédula: ' . $cedula . "\n", FILE_APPEND);
    file_put_contents('login_debug.log', 'Intentando autenticar...' . "\n", FILE_APPEND);
    
    try {
        // Preparamos la consulta para buscar al usuario por su cédula
        $stmt = $conn->prepare("SELECT * FROM USER WHERE USECEDULA = :cedula");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();
        
        file_put_contents('login_debug.log', 'Consulta ejecutada. Filas: ' . $stmt->rowCount() . "\n", FILE_APPEND);
        
        // Verificamos si encontramos al usuario
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            file_put_contents('login_debug.log', 'Usuario encontrado: ' . print_r($user, true) . "\n", FILE_APPEND);
            
            // Comparación de contraseña en texto plano
            if ($password === $user['USEPASSWORD']) {
                file_put_contents('login_debug.log', 'Contraseña correcta. Iniciando sesión.' . "\n", FILE_APPEND);
                
                // Contraseña correcta, creamos la sesión
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['USEID'];
                $_SESSION['cedula'] = $user['USECEDULA'];
                $_SESSION['nombre'] = $user['USENOMBRE'];
                $_SESSION['apellido'] = $user['USEAPELLIDO'];
                $_SESSION['role'] = $user['USEROL'];
                $_SESSION['saldo'] = $user['USESALDO'];
                
                // Redirigimos según el rol del usuario
                if ($user['USEROL'] == 'admin') {
                    file_put_contents('login_debug.log', 'Redirigiendo a admin' . "\n", FILE_APPEND);
                    header("Location: ../principal.php");
                } else {
                    file_put_contents('login_debug.log', 'Redirigiendo a usuario regular' . "\n", FILE_APPEND);
                    header("Location: ../analytics-customers.php");
                }
                exit();
            } else {
                file_put_contents('login_debug.log', 'Contraseña incorrecta' . "\n", FILE_APPEND);
                // Contraseña incorrecta
                $_SESSION['login_error'] = "Contraseña incorrecta";
                header("Location: ../auth-login.php");
                exit();
            }
        } else {
            file_put_contents('login_debug.log', 'Usuario no encontrado' . "\n", FILE_APPEND);
            // Usuario no encontrado
            $_SESSION['login_error'] = "Usuario no encontrado";
            header("Location: ../auth-login.php");
            exit();
        }
    } catch (PDOException $e) {
        file_put_contents('login_debug.log', 'Error en la consulta: ' . $e->getMessage() . "\n", FILE_APPEND);
        // Error en la consulta
        $_SESSION['login_error'] = "Error en el sistema: " . $e->getMessage();
        header("Location: ../auth-login.php");
        exit();
    }
} else {
    file_put_contents('login_debug.log', 'Acceso directo al script sin POST' . "\n", FILE_APPEND);
    // Si alguien intenta acceder directamente a este archivo sin enviar el formulario
    header("Location: ../auth-login.php");
    exit();
}
?>
