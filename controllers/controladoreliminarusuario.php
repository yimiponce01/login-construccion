<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaeliminarusuario.php';
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"] ?? '';

    if (!empty($tmpdatusuario)) {    
        $modelousuario = new modelousuario();
        try {
            // Eliminar usuario por nombre
            $modelousuario->eliminarusuariopornombre($tmpdatusuario);

            // Notificación flotante
            $mensaje = "Usuario eliminado con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Hubo un error al eliminar el usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, ingrese un nombre de usuario válido.";
    }

    mostrarformularioeliminar($mensaje);

} else {
    mostrarformularioeliminar();
}
