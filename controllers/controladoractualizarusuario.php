<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaactualizarusuario.php';
include $_SERVER['DOCUMENT_ROOT'] . '/views/vistanotificacion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit;
}

// Inicializar variables de notificación
$mensajeNotificacion = '';
$tipoNotificacion = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelousuario = new modelousuario();

    // Validar si se envió custId
    $idUsuario = $_POST['custId'] ?? null;

    if ($idUsuario) { // Envío desde el formulario de edición
        $username = $_POST["datusuario"] ?? null;
        $password = $_POST["datpassword"] ?? null;
        $perfil = $_POST["datperfil"] ?? null;

        if ($username && $password && $perfil) {
            try {
                $modelousuario->actualizarusuarios($idUsuario, $username, $password, $perfil);

                // Preparar notificación de éxito y redirección al iframe de "Ver"
                echo "<script>
                    mostrarNotificacion('Usuario modificado con éxito', 'success');
                    setTimeout(function() {
                    parent.document.querySelector('iframe').src = '/controllers/controladorusuario.php';
                    },);
                    </script>";
            } catch (PDOException $e) {
                // Preparar notificación de error
                echo "<script>
                mostrarNotificacion('Hubo un error al modificar el usuario: {$e->getMessage()}', 'error');
            </script>";
            }
        } else {
            // Preparar notificación de datos incompletos
            echo "<script>
            mostrarNotificacion('Datos incompletos para la modificación.', 'error');
        </script>";
        }
    } else {
        $tmpdatusuario = $_POST["datusuario"] ?? null;
        $usuario = $modelousuario->obtenerusuariopornombre($tmpdatusuario);

        if ($usuario) {
            mostrarformularioedicion($usuario);
        } else {
            // Preparar notificación de usuario no encontrado
            $mensajeNotificacion = 'Usuario no encontrado.';
            $tipoNotificacion = 'warning';
            mostrarformulariobusqueda(); // Mostrar solo cuando no hay usuario
        }
    }
} else {
    mostrarformulariobusqueda(); // Mostrar solo al acceder directamente al controlador
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo get_UrlBase('./css/estilodashboard.css') ?>">
</head>

<body>
    <?php
    // Mostrar notificación flotante
    if (!empty($mensajeNotificacion)) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    mostrarNotificacion('$mensajeNotificacion', '$tipoNotificacion');
                });
            </script>";
    }
    ?>
</body>

</html>