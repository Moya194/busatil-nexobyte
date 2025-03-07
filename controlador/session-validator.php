<?php
// Iniciamos sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Verifica si el usuario ha iniciado sesión
 */
function esta_logueado() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

/**
 * Verifica si el usuario actual es administrador
 */
function es_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

/**
 * Verifica si el usuario actual es usuario regular
 */
function es_usuario() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'usuario';
}

/**
 * Redirige al usuario a la pantalla de login si no ha iniciado sesión
 */
function requiere_login() {
    if (!esta_logueado()) {
        header("Location: auth-login.php");
        exit();
    }
}

/**
 * Redirige al usuario si no es administrador
 */
function requiere_admin() {
    requiere_login();
    if (!es_admin()) {
        header("Location: acceso-denegado.php");
        exit();
    }
}

/**
 * Redirige al usuario si no es usuario regular
 */
function requiere_usuario() {
    requiere_login();
    if (!es_usuario()) {
        header("Location: acceso-denegado.php");
        exit();
    }
}
?>