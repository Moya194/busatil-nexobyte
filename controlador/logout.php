<?php
// Iniciamos la sesión
session_start();

// Destruimos todas las variables de sesión
$_SESSION = array();

// Si se está usando un cookie de sesión, lo eliminamos
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruimos la sesión
session_destroy();

// Redirigimos al login
header("Location: ../auth-login.php");
exit();
?>