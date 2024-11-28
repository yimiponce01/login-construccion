<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistausuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

// Mostrar notificación flotante si hay un mensaje en la sesión
if (isset($_SESSION['mensajeNotificacion']) && isset($_SESSION['tipoNotificacion'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            mostrarNotificacion('{$_SESSION['mensajeNotificacion']}', '{$_SESSION['tipoNotificacion']}');
        });
    </script>";
    // Limpiar las variables de sesión después de mostrar la notificación
    unset($_SESSION['mensajeNotificacion'], $_SESSION['tipoNotificacion']);
}

$modelousuario = new modelousuario();

$usuarios = $modelousuario->obtenerUsuarios();

mostrarUsuarios($usuarios);