<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// Verifica si la sesión ya está iniciada
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_controllers('controladordashboard.php'));
    exit;
}

// Manejo de la solicitud POST (inicio de sesión)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = isset($_POST["txtusername"]) ? $_POST["txtusername"] : '';
    $v_password = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : '';

    if ($v_username === "admin" && $v_password === "1234") {
        $_SESSION["txtusername"] = $v_username;
        $_SESSION["txtpassword"] = $v_password;

        // Redirigir al dashboard
        header('Location: ' . get_controllers('controladordashboard.php'));
        exit;
    } else {
        // Redirigir a la vista de error de credenciales
        header('Location: ' . get_views('claveequivocada.php'));
        exit;
    }
}

// Si no hay solicitud POST, renderizar la vista de inicio de sesión
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistalogin.php';
?>
