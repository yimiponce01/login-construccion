<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Verifica si el usuario intentó iniciar sesión
if (!isset($_SESSION['clave_intento'])) {
    // Si no hay un intento de clave, redirige al login
    header('Location: /index.php');
    exit;
}

// Destruir la sesión si se intenta acceder directamente
unset($_SESSION['clave_intento']);

// Cargar la vista de clave incorrecta
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaclaveincorrecta.php';
?>
