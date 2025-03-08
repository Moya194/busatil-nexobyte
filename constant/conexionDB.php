<?php
// Conexión a la base de datos usando PDO
$host = 'localhost';
$dbname = 'bursatil-nexobyte';   // Cambia al nombre real de tu BD
$username = 'root';           // Usuario de tu BD
$password = '';               // Contraseña de tu BD (si la tienes)

try {
    // Construimos el DSN (Data Source Name) para MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configuramos el modo de errores de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si falla la conexión, mostramos un mensaje de error y salimos
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>
