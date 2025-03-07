<?php 
// Archivo de conexión con manejo de errores (try-catch) usando PDO
$servername = "localhost"; // Dirección del servidor de la base de datos
$username = "root"; // Tu usuario de base de datos
$password = ""; // Tu contraseña de base de datos
$dbname = "bursatil-nexobyte"; // Nombre de la base de datos

try {
    // Crear una conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Remover o comentar este echo para evitar problemas con las redirecciones
    // echo "Conexión exitosa a mi base de datos real";
} catch (PDOException $e) {
    // Si ocurre un error, se captura y se registra pero no se muestra al usuario
    error_log("Error de conexión a la base de datos: " . $e->getMessage());
    // En producción es mejor no mostrar el error específico al usuario
    // echo "Error en el sistema. Por favor contacte al administrador.";
}
?>