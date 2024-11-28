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

            // Notificación flotante y redirección al iframe de "Ver"
            echo "<script>
            mostrarNotificacion('Usuario eliminado con éxito.', 'success');
            setTimeout(function() {
                parent.document.querySelector('iframe').src = '/controllers/controladorusuario.php';
            },);
        </script>";
        } catch (PDOException $e) {
            // Notificación de error
            echo "<script>
            mostrarNotificacion('Hubo un error al eliminar el usuario: {$e->getMessage()}', 'error');
        </script>";
        }
    } else {
        // Notificación de datos inválidos
        echo "<script>
        mostrarNotificacion('Por favor, ingrese un nombre de usuario válido.', 'warning');
    </script>";
    }

} else {
    mostrarformularioeliminar();
}
